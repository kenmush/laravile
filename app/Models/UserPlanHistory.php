<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPlanHistory extends Model
{
    use SoftDeletes;

    protected $appends = ['plan'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_plan_histories';
    //-------------------------------------------------------------------------

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    //-------------------------------------------------------------------------


    public function getPlanAttribute()
    {
        return Plan::find($this->id);
    }

    public function plans(){
        return $this->hasOne('App\Models\Plan','id','plan_id');
    }
}
