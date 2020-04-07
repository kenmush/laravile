<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['name','key','value'];

}
