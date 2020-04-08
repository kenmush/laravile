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

    protected $redirectTo = 'client/dashboard';



    public function showLoginForm()
    {
        return view('userclient.auth.login');
    }

    public function clientLogin(ClientRequest $request){
        if(Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('client.dashboard');
        }
        return back()->withInput($request->only('email','remember'));
    }

    protected function guard()
    {
      return Auth::guard('client');
    }
}
