<?php

namespace App\Promotor;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Promotor extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'promotors';

    protected $fillable = ['name', 'email', 'affiliate_url', 'invite', 'success_invited', 'share' ,'password'];

      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function promotorUser(){
        return $this->hasMany('App\Promotor\PromotorUser', 'promotor_id', 'id');
    }

    public function getPaymentInfoAttribute(){
        $payment = PromotorUser::join('payment_history_logs','promotor_user.payment_id','payment_history_logs.id')
        ->where('promotor_id',$this->id)
        ->pluck('amount')->toArray();
        return (float)(array_sum($payment)/100);
    }

    public function promotorSalesInfo(){
        return $this->belongsToMany('App\Models\PaymentHistoryLog','App\Promotor\PromotorUser','promotor_id','payment_id');
    }
}
