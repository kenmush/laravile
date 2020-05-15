<?php

namespace App\Http\Controllers\UserClient;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Alert;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DashboardController extends Controller
{
    public function index()
    {
        $client_id = auth('client')->id();
        $client = Client::findOrFail($client_id );

        $domain = $client->domain;
        if (isset($_COOKIE[clean($domain)])) {
            $urls = unserialize($_COOKIE[clean($domain)]);
        } else {
            $token = config('constants.AHREFS_TOKEN');
            $url = "https://apiv2.ahrefs.com?from=backlinks&target=$domain&mode=domain&limit=10&order_by=ahrefs_rank%3Adesc&output=json&token=$token";
            $res = Http::get($url)->json();

            $urls = [];
            if (isset($res['refpages'])) {
                foreach ($res['refpages'] as $urlData) {
                    $u['Url'] = $urlData['url_from'];
                    array_push($urls, $u);
                }
                $serializeUrls = serialize($urls);
                setcookie(clean($domain), $serializeUrls, time() + (86400 * 30), "/");
            }
        }

        $urlsCount = 0;
        if (isset($client->reports)) {
            foreach ($client->reports as $report) {
                $urlsCount += $report->urls;
            }
        }
        $alertCount = Alert::where('client_id', $client_id)->count();

        $socialShareCount = 0;
        $reports = Report::where('client_id', $client_id)->get();

        foreach ($reports as $report) {
            $socialShareCount += $report->metrics->social_share ?? 0;
        }

        return view('userclient.dashboard.index', compact(
            'client',
            'urlsCount',
            'urls',
            'alertCount',
            'socialShareCount'
        ));
    }
}
