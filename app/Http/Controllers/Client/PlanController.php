<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Invite;
use App\Models\PaymentHistoryLog;
use App\Models\Plan;
use App\Models\UserPlanHistory;
use App\User;
use Illuminate\Http\Request;
use Auth;

class PlanController extends Controller
{
    /**
     * Display a plan page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.plan.index');
    }
    //-------------------------------------------------------------------------

    /**
     * Display a payment page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $data = $this->validate($request, [
            'plan' => 'required'
        ]);
        session(['plan' => $data['plan']]);
        if (auth()->check()) {
            return response([
                'redirect_url' => route('plan.payment.show')
            ]);
        } else {
            return response([
                'redirect_url' => route('register')
            ]);
        }
    }
    //-------------------------------------------------------------------------

    /**
     * Display a payment page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function showPayment(Request $request)
    {
        $plan = session()->get('plan');
        $plan =  Plan::find($plan);
        if (empty($plan)) {
            return redirect()->route('plan.index');
        }
        return view('client.plan.payment', compact('plan'));
    }
    //-------------------------------------------------------------------------


    /**
     * handel  payment action.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function doPayment(Request $request)
    {
        $plan = Plan::find($request->plan);
        $user = auth()->user();
        try {

            if ($user->hasStripeId() && $user->paymentMethods()->count()) {

                \Stripe\Stripe::setApiKey(env("STRIPE_SECRET"));
                $cards = \Stripe\Customer::allSources(
                    $user->stripe_id,
                    [
                        'limit' => 3,
                        'object' => 'card',
                    ]
                );
                if (!isset($cards->data[0]->id)) {
                    $cu = \Stripe\Customer::createSource(
                        $user->stripe_id, // stored in your application
                        [
                            'source' => $request->stripeToken // obtained with Checkout
                        ]
                    );
                }
            } else {

                $user->createAsStripeCustomer();
                \Stripe\Stripe::setApiKey(env("STRIPE_SECRET"));

                $cu = \Stripe\Customer::createSource(
                    $user->stripe_id, // stored in your application
                    [
                        'source' => $request->stripeToken // obtained with Checkout
                    ]
                );
            }
            \Stripe\Stripe::setApiKey(env("STRIPE_SECRET"));

            // run your code here
            $payment =  \Stripe\Charge::create([
                "amount" => $plan->price * 100,
                "currency" => "usd",
                "customer" => $user->stripe_id,
                "description" => "Charge for " . $user->email
            ]);
            if ($user->plan_id == null) {
                $currentDate = date('Y-m-d');
                $endDate = date('Y-m-d', strtotime($currentDate . " + $plan->validity days"));
                $planHistory =  UserPlanHistory::create([
                    'user_id' => $user->id,
                    'plan_id' => $request->plan,
                    'start_date' => $currentDate,
                    'end_date' => $endDate,
                    'status' => 1
                ]);
                $user->update([
                    'plan_id' => $planHistory->id,
                    'no_of_users' => $plan->users,
                    'no_of_reports' => $plan->report
                ]);
            } else {
                if (isset($user->activePlan)) {
                    $planHistory =  UserPlanHistory::find($user->activePlan->id);
                    $currentDate = date('Y-m-d');
                    $endDate = date('Y-m-d', strtotime($currentDate . " + $plan->validity days"));
                    if ($planHistory->status == 2) {
                        $planHistory =  UserPlanHistory::create([
                            'user_id' => $user->id,
                            'plan_id' => $request->plan,
                            'start_date' => $currentDate,
                            'end_date' => $endDate,
                            'status' => 1
                        ]);
                        $user->update(['plan_id' => $planHistory->id]);
                    } else {
                        $planHistory =  UserPlanHistory::create([
                            'user_id' => $user->id,
                            'plan_id' => $request->plan,
                            'start_date' => null,
                            'end_date' => null,
                            'status' => 0
                        ]);
                    }
                }
            }
            self::addPaymentLog($payment);
            if (!empty($_COOKIE['invite'])) {
                $user = User::find($_COOKIE['invite']);
                $invite = $user->invite ?? null;
                if ($invite) {
                    $count = (int) $invite->count + 1;
                } else {
                    $count = 1;
                }
                if ($user) {
                    Invite::updateOrCreate([
                        'user_id' => $user->id,
                    ], [
                        'count' => $count,
                    ]);
                }
            }

            return redirect('dashboard')->with('success', 'Payment Success.');;
        } catch (\Stripe\Error\Card $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            self::addPaymentErrorLog($e);
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Too many requests made to the API too quickly
            self::addPaymentErrorLog($e);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
            self::addPaymentErrorLog($e);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            self::addPaymentErrorLog($e);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Network communication with Stripe failed
            self::addPaymentErrorLog($e);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
            self::addPaymentErrorLog($e);
        } catch (\Stripe\Error\InvalidRequest $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            self::addPaymentErrorLog($e);
        } catch (\Stripe\Error\Authentication $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            self::addPaymentErrorLog($e);
        } catch (\Stripe\Error\Permission $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            self::addPaymentErrorLog($e);
        } catch (\Stripe\Error\Api $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            self::addPaymentErrorLog($e);
        } catch (\Exception $e) {
            // Something else happened, completely unrelated to Stripe
            //return $e->getMessage();
            self::addPaymentErrorLog($e);
        }
    }
    //-------------------------------------------------------------------------

    /**
     * Store the payment response received from Stripe.
     *
     * @param  array  $payment
     * @return \Illuminate\Http\Response
     */
    public function addPaymentLog($payment)
    {
        $data  = [];

        $data  = [
            "user_id"                   => Auth::id() ?? "",
            "transaction_id"            => $payment['transaction_id'] ?? "",
            "charge"                    => $payment['charge'] ?? "",
            "amount"                    => $payment['amount'] ?? "",
            "amount_refunded"           => $payment['amount_refunded'] ?? "",

            "application"               => $payment['application'] ?? "",
            "application_fee"           => $payment['application_fee'] ?? "",
            "application_fee_amount"    => $payment['application_fee_amount'] ?? "",
            "balance_transaction"       => $payment['balance_transaction'] ?? "",

            "captured"                  => $payment['captured'] ?? "",
            "created"                   => $payment['created'] ?? "",
            "currency"                  => $payment['currency'] ?? "",
            "customer"                  => $payment['customer'] ?? "",

            "description"               => $payment['description'] ?? "",
            "destination"               => $payment['destination'] ?? "",
            "despute"                   => $payment['despute'] ?? "",
            "failure_code"              => $payment['failure_code'] ?? "",
            "failure_message"           => $payment['failure_message'] ?? "",

            "paid"                      => $payment['paid'] ?? "",
            "payment_intent"            => $payment['payment_intent'] ?? "",
            "payment_method"            => $payment['payment_method'] ?? "",

            "receipt_email"             => $payment['receipt_email'] ?? "",
            "receipt_number"            => $payment['receipt_number'] ?? "",
            "receipt_url"               => $payment['receipt_url'] ?? "",
            "refunded"                  => $payment['refunded'] ?? "",
            "status"                    => $payment['status'] ?? "",
            "raw_data"                  => json_encode($payment),
        ];

        return PaymentHistoryLog::create($data);
    }
    //-------------------------------------------------------------------------

    /**
     * Store the payment response received from Stripe.
     *
     * @param  array  $payment
     * @return \Illuminate\Http\Response
     */
    public function addPaymentErrorLog($error)
    {
        dd($error);
        $errorData = $error->getJsonBody();
        $payment  = $errorData['error'];

        $data  = [];

        $data  = [
            "user_id"                   => Auth::id() ?? "",
            "charge"                    => $payment['charge'] ?? "",
            "description"               => $payment['message'] ?? "",
            "failure_code"              => $payment['code'] ?? "",
            "failure_message"           => $payment['message'] ?? "",
            "status"                    => "Failed",
            "raw_data"                  => json_encode($payment),
        ];

        return PaymentHistoryLog::create($data);
    }
    //-------------------------------------------------------------------------
}
