<?php

namespace App;

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
    // protected $fillable = [
    //     'name', 'email', 'password', 'role_id', 'plan_id', 'profile_picture',
    // ];

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

    public function activePlan()
    {
        return $this->belongsTo('App\Models\Plan', 'plan_id');
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
}
