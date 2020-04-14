<?php

namespace App\Promotor;

use Illuminate\Database\Eloquent\Model;

class AffiliateView extends Model
{
    protected $table = "affiliate_view";

    protected $fillable = ['token', 'url', 'session_id', 'user_id'];
}
