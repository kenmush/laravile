<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\UserPlanHistory;
use App\User;
use Illuminate\Http\Request;

class CronController extends Controller
{
    /**
     * Active pending plan and expire old plan
     *
     * @return \Illuminate\Http\Response
     */
    public function updateSubscription()
    {
        $currentDate = date('Y-m-d');
        $userPlans = UserPlanHistory::whereNotIn('status', [2])
            ->whereDate('end_date', '<=', $currentDate)
            ->get();

        foreach ($userPlans  as $userPlan) {
            $activePlanDate =  date('Y-m-d', strtotime($currentDate . "1 days"));
            $userPlan->update(['status' => 2]);

            $pendingPlan = UserPlanHistory::where([
                'user_id' => $userPlan->user_id,
                'status' => 0
            ])->first();

            $plan = Plan::find($userPlan->plan_id);
            $user = User::find($userPlan->user_id);

            $pendingPlan->update([
                'start_date' => $activePlanDate,
                'end_date' => date('Y-m-d', strtotime($activePlanDate . " + $plan->validity days")),
                'status' => 1
            ]);
            $user->update([
                'plan_id' => $pendingPlan->id
            ]);
            echo "updated.";
        }

        return;
    }
}
