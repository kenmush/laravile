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
        $user = auth()->user();
        $activePlan = $user->activePlan;
        if (auth()->user()->parent) {
            $user = auth()->user()->parent;
            $activePlan = $user->activePlan;
        }
        $invites = auth()->user()->invite->count ?? 0;
        return view('client.subscription.manage', compact('activePlan', 'user','invites'));
    }
    //-------------------------------------------------------------------------

}
