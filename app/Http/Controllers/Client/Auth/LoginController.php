<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\ClientRequest;
use Auth;

class LoginController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }


    public function showLoginForm()
    {
        return view('client.auth.login');
    }

    public function clientLogin(ClientRequest $request){

        if(Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('home');
        }
        return back()->withInput($request->only('email','remember'));
    }

    protected function guard()
    {
      return Auth::guard('client');
    }
}
