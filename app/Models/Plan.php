<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Plan extends Model
{
    use SoftDeletes;

    protected $appends = ['user_value'];

    protected $fillable = ['title','type','books','clients','users','reports','price'];

    public function getUserValueAttribute(){
        $user = User::find($this->users);
        return $user['email'];
    }
}
