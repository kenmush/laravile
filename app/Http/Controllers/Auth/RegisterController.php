<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Promotor\Promotor;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Promotor\PromotorUser;
use App\Promotor\AffiliateTracker;
use App\User;
use Auth;
use Newsletter;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;

    public function redirectTo()
    {
        if (Auth::user()->role_id == 1) {
            $this->redirectTo = 'admin/dashboard';
            return $this->redirectTo;
        } else {
            $this->redirectTo = 'payment';
            return $this->redirectTo;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // if affiliate user Register
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if (isset($data['newsletter'])) {
            Newsletter::subscribe($data['email']);
        }

        if (Cookie::has('track'))
            AffiliateTracker::where('token', Cookie::get('track'))->update(['has_register' => 1, 'user_id' => $user->id]);

        return $user;
    }
}
