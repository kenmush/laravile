<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomReport extends Model
{
    protected $fillable = ['user_id','report_id', 'title', 'slug', 'cover', 'html' , 'css','template' ];
}
