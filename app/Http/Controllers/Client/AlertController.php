<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($client_id)
    {
        $alerts = Alert::where('client_id', $client_id)->get();
        return view('client.alerts.index', compact('alerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.alerts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $client_id)
    {
        $this->validate($request, [
            'name' => 'required',
            'keywords' => 'required',
            'countries' => 'required',
        ]);
        
        $name = $request->name;
        $keywords = explode(',', $request->keywords);
        $accountId = config('constants.MENTION_ACCOUNT_ID');
        $token = config('constants.MENTION_TOKEN');
        $formData = [
            'name' => $name,
            'query' => [
                'type' => "basic",
                'included_keywords' => $keywords,
            ],
            'languages' => ["en"],
            'sources' => ["web"]
        ];

        $res = Http::withHeaders(['Authorization' => "Bearer $token"])
            ->post("https://api.mention.net/api/accounts/$accountId/alerts", $formData)
            ->json();

        $alertId = 1;
        if (isset($res['alert']['id'])) {
            $alertId = $res['alert']['id'];
        }
        Alert::create([
            'id' => $alertId,
            'client_id' => $client_id,
            'name' => $name,
            'keywords' => $request->keywords,
            'countries' => $request->countries,
        ]);
        return redirect()->route('alert.index', $client_id)->with('success', 'Alert created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($client_id, $id)
    {
        $token = config('constants.MENTION_TOKEN');
        $accountId = config('constants.MENTION_ACCOUNT_ID');
        $res = Http::withHeaders(['Authorization' => "Bearer $token"])
            ->get("https://api.mention.net/api/accounts/$accountId/alerts/$id/mentions")
            ->json();

        $urls = [];
        if (isset($res['mentions'])) {
            foreach ($res['mentions']  as $url) {
                array_push($urls, $url['original_url']);
            }
        }
        $urls = array_slice($urls, 0, 10);

        return view('client.partials.alert_urls', compact('urls'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client_id, $alertId)
    {
        Alert::destroy($alertId);
        return redirect()->route('alert.index', $client_id)->with('error', 'Alert deleted Successfully.');
    }
}
