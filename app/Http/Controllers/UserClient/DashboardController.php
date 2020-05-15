<?php

namespace App\Http\Controllers\UserClient;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DashboardController extends Controller
{
    public function index()
    {
        $client = Client::findOrFail(auth('client')->id());

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
        return view('userclient.dashboard.index', compact('client', 'urlsCount', 'urls'));
    }
}
