<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $activePlan = auth()->user()->activePlan;
        return view('client.subscription.manage', compact('activePlan'));
    }
    //-------------------------------------------------------------------------

}
