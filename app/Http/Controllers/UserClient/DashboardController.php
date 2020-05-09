<?php

namespace App\Http\Controllers\UserClient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('userclient.dashboard.index');
    }
}
