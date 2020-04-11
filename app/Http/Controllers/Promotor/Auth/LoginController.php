<?php

namespace App\Http\Controllers\Promotor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PromotorRequest;
use Auth;

class LoginController extends Controller
{
    // protected $redirect = '/promotor/dashboard';

    public function showLoginForm(){
        return view('promotor.auth.login');
    }

    public function promotorLogin(PromotorRequest $request){

        if(Auth::guard('promotor')->attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->route('promotor.dashboard');
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
