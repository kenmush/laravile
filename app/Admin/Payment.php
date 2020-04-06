<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{   
    protected $table = 'payment_setting';

    protected $fillable = ['name','key','value'];
}
