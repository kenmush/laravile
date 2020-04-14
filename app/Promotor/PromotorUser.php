<?php

namespace App\Promotor;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentHistoryLog;

class PromotorUser extends Model
{
    protected $table = 'promotor_user';

    protected $appends = ['earn_value'];

    public $timestamps = false;

    protected $fillable = ['promotor_id', 'affiliate_url', 'user_id', 'payment_id'];

    public function paymentInfo(){
        return $this->hasOne('App\Models\PaymentHistoryLog','id','payment_id');
    }

    public function getEarnValueAttribute(){
        $data = PaymentHistoryLog::find($this->payment_id);
        $commission = (float)($data['amount']/100) * (15/100);
        return $commission;
    }


}
