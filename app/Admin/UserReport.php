<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
class UserReport extends Model
{
    use SoftDeletes;

    protected $appends = ['user_value'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "user_reports";

    public function getUserValueAttribute(){
        $data = User::where('id',$this->user_id)->first();
        return $data['email'];
    }
}
