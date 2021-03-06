<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handel user welcome page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $parentPlan = $user->parent->plan_id  ?? null;
        if ($user->plan_id == null && $parentPlan == null) {
            return redirect()->route('plan.payment.show');
        } else {
            return redirect('dashboard');
        }
    }
    //-------------------------------------------------------------------------
}
