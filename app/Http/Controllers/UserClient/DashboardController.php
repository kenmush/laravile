<?php

namespace App\Http\Controllers\UserClient;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $client_id = auth()->id();
        $client = Client::findOrFail($client_id);

        $urls = [];

        $urlsCount = 0;
        if (isset($client->reports)) {
            foreach ($client->reports as $report) {
                $urlsCount += $report->urls;
            }
        }
        return view('userclient.dashboard.client_dashboard', compact('client', 'urlsCount', 'urls'));
    }
}
