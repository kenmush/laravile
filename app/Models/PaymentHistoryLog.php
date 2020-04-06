<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class PaymentHistoryLog extends Model
{
    use SoftDeletes;

    protected $appends = ['user_value','amount_value'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_history_logs';
    //-------------------------------------------------------------------------

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    //-------------------------------------------------------------------------

    public function getUserValueAttribute(){
        $data = User::where('id',$this->user_id)->first();
        return $data['email'];
    }
    public function getAmountValueAttribute(){
        $data = (float) ($this->amount / 100);
        return $data;
    }

}
