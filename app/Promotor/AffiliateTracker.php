<?php

namespace App\Promotor;

use Illuminate\Database\Eloquent\Model;

class AffiliateTracker extends Model
{
    protected $table = "affiliate_tracker_history";

    protected $fillable = ['token', 'affiliate_url', 'ip_address', 'browser', 'device' ,'operating_system'];
}
