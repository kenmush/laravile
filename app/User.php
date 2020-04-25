<?php

namespace App;

use App\Models\Invite;
use App\Models\Plan;
use App\Models\TeamMember;
use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, Billable;

    protected $appends = ['role_value'];
    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'plan_id', 'profile_picture','no_of_users','no_of_reports','no_of_clients',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleValueAttribute()
    {
        $role = array(
            '1' => 'Admin',
            '2' => 'User'
        );
        return @$role[$this->role_id];
    }


    public function userPlans()
    {
        return $this->hasMany('App\Models\UserPlanHistory');
    }

    public function getActivePlanAttribute()
    {
        $planHistory = $this->userPlans()->where('status', 1)->first();
        if (isset($planHistory)) {
            return $planHistory;
        }
    }

    public function getChildMembersAttribute()
    {
        $childTeams =  TeamMember::where('parent_user_id', $this->id)->get();
        $childMembers = [];
        foreach ($childTeams as $key => $member) {
            $childMembers[$key] = $this->find(($member->child_user_id ?? 0));
        }
        return $childMembers;
    }

    public function getParentAttribute()
    {
        $parent =  TeamMember::where('child_user_id', $this->id)->first();
        return $this->find(($parent->parent_user_id ?? 0));
    }

    public function orders()
    {
        return $this->hasMany('App\Models\UserPlanHistory');
    }

    public function activePlans()
    {
        return $this->belongsTo('App\Models\Plan','plan_id','id');
    }

    public function invite()
    {
        return $this->hasOne('App\Models\Invite');
    }

    public function increasingPerMonth(){
          // incresing percentage per month
          $previousMonth = $this::orderBy('created_at', 'DESC')
          ->whereDate('created_at', '<', \Carbon\Carbon::now()->subMonth())
          ->get()->count();

          $thisMonth = $this::orderBy('created_at', 'DESC')
          ->whereDate('created_at', '>', \Carbon\Carbon::now()->subMonth())
          ->get()->count();

          $a =  $thisMonth - $previousMonth;

          $thisMonth == 0 ? $b = 0 : $b =  $a / $thisMonth;

          return round($b * 100,2);
    }

    public function increasingPerYear(){
        $previousYear = User::orderBy('created_at', 'DESC')
        ->whereDate('created_at', '<', \Carbon\Carbon::now()->subYear())
        ->get()->count();

        $thisYear = User::orderBy('created_at', 'DESC')
        ->whereDate('created_at', '>', \Carbon\Carbon::now()->subYear())
        ->get()->count();

        $c =  $thisYear - $previousYear;

        $thisYear == 0 ? $d = 0 : $d =  $c / $thisYear;

        return round($d * 100,2);
    }
}
