<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // public function __construct()
    // {
    // //   $this->middleware('guest:company')->except('logout');
    // }

    public function showAdminLoginForm()
    {
    //   $data['login_text'] = LoginTexts::select('for_company')->first();
      return view('admin.auth.login');
   }
}
