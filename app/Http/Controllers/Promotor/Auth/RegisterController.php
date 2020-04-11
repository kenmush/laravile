<?php

namespace App\Http\Controllers\Promotor\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Promotor\Promotor;

class RegisterController extends Controller
{
    public function showRegisterForm(){
        return view('promotor.auth.register');
    }

    public function register(Request $request){

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:promotors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $post = Promotor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'affiliate_url' => '?ref='. rand(),
        ]);

        return redirect()->route('promotor.login');

    }
}
