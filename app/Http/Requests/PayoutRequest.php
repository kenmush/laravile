<?php

namespace App\Http\Requests;
use App\Promotor\PromotorUser;
use Illuminate\Foundation\Http\FormRequest;

class PayoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        
        $item = PromotorUser::where('has_refund',0)
        ->where('promotor_id',auth('promotor')->id())
        ->get();
        $countTotalEarning = 0;
        foreach($item as $d){
            $countTotalEarning += $d->earn_value;
        }
        
        return [
            'payment_method' => 'required',
            'email' => 'required|email',
            'email_confirmation' => 'required|email|same:email',
            'amount' => 'required|numeric|max:'.$countTotalEarning.'',
        ];
    }

    public function messages()
    {
        return [
            'email_confirmation.same' => 'Email Confirmation should match the Email',
        ];
    }
}
