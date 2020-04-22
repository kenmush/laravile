<?php

namespace App\Promotor;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $fillable = ['promotor_id','payment_method', 'email', 'amount'];
}
