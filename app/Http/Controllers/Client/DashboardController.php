<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
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
        $clients = Client::with('reports')->where('user_id', auth()->id())->get();
        return view('client.dashboard.index', compact('clients'));
    }
    //-------------------------------------------------------------------------

    /**
     * Display Client Dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function clientDashboard($client_id)
    {
        $client = Client::findOrFail($client_id);
        $urlsCount = 0;
        if (isset($client->reports)) {
            foreach ($client->reports as $report) {
                $urlsCount += $report->urls;
            }
        }

        return view('userclient.dashboard.index', compact('client', 'urlsCount'));
    }
    //-------------------------------------------------------------------------

}
