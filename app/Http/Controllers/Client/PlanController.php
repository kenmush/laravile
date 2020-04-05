<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

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

        $plan =  Plan::findOrFail($data['plan']);
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
        dd($request->all());
        $data = $this->validate($request, [
            'plan' => 'required'
        ]);

        $plan =  Plan::findOrFail($data['plan']);
        return view('client.plan.payment', compact('plan'));
    }
    //-------------------------------------------------------------------------
}
