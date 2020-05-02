<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Plan;
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
        $activePlan = Plan::find($activePlan->plan_id);
        $invites = auth()->user()->invite->count ?? 0;
        $inviteCode = auth()->user()->invite_code;
        if (empty($inviteCode)) {
            auth()->user()->update(['invite_code' => rand()]);
        }
        return view('client.subscription.manage', compact('activePlan', 'user', 'invites', 'inviteCode'));
    }
    //-------------------------------------------------------------------------

}
