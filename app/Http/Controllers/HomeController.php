<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Home Page
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ref = $request->ref;
        if (isset($ref) && !empty($ref)) {
            $user = User::where('invite_code', $ref)->firstOrFail();
            setcookie('invite_code', $user->invite_code, time() + 2592000, "/"); //2592000 ==30days
            return view('client.plan.index', compact('ref'));
        }
        return view('welcome');
    }
}
