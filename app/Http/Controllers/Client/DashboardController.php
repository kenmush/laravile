<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display Dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.dashboard.index');
    }
    //-------------------------------------------------------------------------

}
