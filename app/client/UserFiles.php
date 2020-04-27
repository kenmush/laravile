<?php

namespace App\client;

use Illuminate\Database\Eloquent\Model;

class UserFiles extends Model
{
    protected $fillable = ['user_id','file'];
}
