<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
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

    public function clientLogin(ClientRequest $request)
    {
        $client = Client::where('email', $request->email)->first();
        if ($client->status == 0) {
            return redirect()->back()->with('error', 'Client is In-Active');
        }

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('client.dashboard');
        }
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'These credentials do not match our records.');
    }

    protected function guard()
    {
        return Auth::guard('client');
    }
}
