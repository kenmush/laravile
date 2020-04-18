<?php

namespace App\Promotor;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentHistoryLog;
use App\Models\UserPlanHistory;

class PromotorUser extends Model
{
    protected $table = 'promotor_user';

    protected $appends = ['earn_value','comission'];

    public $timestamps = false;

    protected $fillable = ['promotor_id', 'affiliate_url', 'user_id', 'payment_id'];

    public function paymentInfo(){
        return $this->hasOne('App\Models\PaymentHistoryLog','id','payment_id');
    }

    public function getComissionAttribute(){
        $plan = UserPlanHistory::with('plans')->where('user_id',$this->user_id)->first();
        return $plan->plans->comission;
    }

    public function getEarnValueAttribute(){
        $data = PaymentHistoryLog::find($this->payment_id);
        $plan = UserPlanHistory::with('plans')->where('user_id',$this->user_id)->first();
        $commission = (float)($data['amount']/100) * ($plan->plans->comission/100);
        return $commission;
    }


}
