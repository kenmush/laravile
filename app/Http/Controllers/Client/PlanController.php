<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PaymentHistoryLog;
use App\Models\Plan;
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
        return response([
            'redirect_url' => route('register')
        ]);
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
        $plan =  Plan::findOrFail($plan);
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
                echo $user->stripe_id;
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

            $user->update(['plan_id' => $request->plan]);
            self::addPaymentLog($payment);
            return redirect('user/dashboard');
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
            //"job_id"                    => $payment['job_id'] ?? "",
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
        $errorData = $error->getJsonBody();
        $payment  = $errorData['error'];

        $data  = [];

        $data  = [
            "user_id"                   => Auth::id() ?? "",
            //"job_id"                    => $payment['job_id'] ?? "",                   
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
