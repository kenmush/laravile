<?php

namespace App\Promotor;

use Illuminate\Database\Eloquent\Model;

class AffiliateTracker extends Model
{
    protected $table = "affiliate_tracker_history";

    protected $fillable = ['token', 'affiliate_url', 'ip_address', 'browser', 'device' ,'operating_system'];

    public function view(){
        return $this->hasMany('App\Promotor\AffiliateView','token','token');
    }

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}
