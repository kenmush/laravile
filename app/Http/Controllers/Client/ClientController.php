<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\ClientRequest;
use App\Exports\ClientExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Client;
use App\Models\Coverage;
use App\Models\Metrics;
use App\Models\Report;
use Auth;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clients'] = Client::where('user_id', Auth::user()->id)->paginate(10);
        return view('client.client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.client.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $input = $request->all();
        if (Client::where('email', $input['email'])->exists()) {
            return redirect()->back()->with('failure', 'Email already exists ')->withInput($request->only('email', 'url'));
        }

        if ($input['password'] == $input['password_confirmation']) {

            $post = Client::withTrashed()
                ->where('email', $input['email'])
                ->exists();
            if ($post) {
                Client::withTrashed()
                    ->where('email', $input['email'])
                    ->restore();
                unset($input['_token']);
                unset($input['password_confirmation']);
                Client::where('email', $input['email'])->update($input);
                return redirect()->back()->with('success', 'Client Added Succesfully!');
            } else {
                if ($request->hasFile('logo')) {
                    $logo = \Storage::put('logo', $request->logo);
                }

                $client = Client::create([
                    'name' =>  $input['name'],
                    'logo' =>  $logo ?? null,
                    'domain' =>  $input['domain'],
                    'user_id' =>  auth()->user()->id,
                    'email' => $input['email'],
                    'password' => Hash::make($input['password']),
                ]);
                return redirect()->route('client.report', $client->id)->with('success', 'Client Added Succesfully!');
            }
        } else {
            return redirect()->back()->with('failure', 'Password did not match')->withInput($request->only('email', 'url'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['client'] = Client::find($id);
        return view('client.client.add', $data);
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
        $data = $request->all();

        unset($data['_token']);
        unset($data['_method']);
        if ($data['password'] == null) {
            $user = Client::find($id);
            $data['password'] = $user['password'];
            unset($data['password_confirmation']);
            Client::where('id', $id)->update($data);
            return redirect()->back()->with('success', 'Client Detail Update Success!');
        } else {
            if ($data['password'] == $data['password_confirmation']) {
                unset($data['password_confirmation']);
                $data['password'] = Hash::make($data['password']);
                Client::where('id', $id)->update($data);
                return redirect()->back()->with('success', 'Client Detail Update Success!');
            } else {
                return redirect()->back()->with('failure', 'Client Confirm Password Did not Match!')->with($request->only('url', 'email'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::destroy($id);
        if ($client)
            return redirect()->back()->with('success', 'Client Delete Success!');
        else
            return redirect()->back()->with('failure', 'Client Delete Unsuccessful!');
    }

    public function Export()
    {
        return Excel::download(new ClientExport, 'ClientList.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }


    /**
     * Show report generate module
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report($id)
    {
        $client = Client::findOrFail($id);
        $domain = $client->domain;
        $url = "https://awis.api.alexa.com/api?Action=SitesLinkingIn&Count=5&ResponseGroup=SitesLinkingIn&Url=$domain";

        $res = Http::withHeaders([
            'x-api-key' => config('constants.ALEXA_TOKEN')
        ])->get($url)->body();
        $res = xmlToArray($res);

        $urls = [];
        if (isset($res['Results']['Result']['Alexa']['SitesLinkingIn']['Site'])) {
            $urls = $res['Results']['Result']['Alexa']['SitesLinkingIn']['Site'];
        }
        return view('client.client.report', compact('urls', 'id'));
    }
    //-------------------------------------------------------------------------

    /**
     * Generate report 
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function generateReport(Request $request)
    {
        $urlsArray = explode(',', $request->urls);
        $report = Report::create([
            "name" => $request->name,
            "user_id" => auth()->user()->id,
            "style_id" => 1,
            "metric_id" => 0,
        ]);

        (int) $noOfCoverage = 0;
        (int) $totalDomainAuthority = 0;
        (int) $totalMonthVisit = 0;
        (int) $socialShare = 0;

        foreach ($urlsArray as $url) {

            try {
                $screen_shot_featured =  "screenshot/" . rand() . "screen_shot_featured.png";
                $screen_shot_full_screen =  "screenshot/" . rand() . "full_screen.png";
                Browsershot::url("http://" . $url)->fullPage()->save($screen_shot_full_screen);
                Browsershot::url("http://" . $url)->windowSize(640, 480)->save($screen_shot_featured);
            } catch (\Exception $e) {
                \Log::info($e);
            }



            $postUrl = "https://awis.api.alexa.com/api?Action=TrafficHistory&Range=5&ResponseGroup=History&Url=$url";
            $res = Http::withHeaders([
                'x-api-key' => config('constants.ALEXA_TOKEN')
            ])->get($postUrl)->body();
            $res = xmlToArray($res);

            $data = [];
            if (isset($res['Results']['Result']['Alexa']['TrafficHistory'])) {
                $data = $res['Results']['Result']['Alexa']['TrafficHistory'];
            }

            $config = config('constants.SHARE_COUNT_KEY');
            $shareCount = Http::get("https://api.sharedcount.com/v1.0/?url=http://$url&apikey=$config")->body();
            $shareCount = json_decode($shareCount, true);


            $avrageMonthVisit = $this->averageView($data);
            $da = $this->getDA($url);
            $facebookShare = isset($shareCount['Facebook']['share_count']) ? $shareCount['Facebook']['share_count'] : 0;
            $twitterShare = isset($shareCount['Twitter']) ? $shareCount['Twitter'] : 0;
            $pintrestShare = isset($shareCount['Pinterest']) ? $shareCount['Pinterest'] : 0;

            $totalDomainAuthority += $da;
            $totalMonthVisit += $avrageMonthVisit;
            $socialShare += (int) $facebookShare + (int) $twitterShare + (int) $pintrestShare;

            $coverage =  Coverage::create([
                "report_id" => $report->id,
                "url" => $url,
                "title" => $data['Site'] ?? "",
                "report_date" => date('Y-m-d'),
                "monthly_visit" => $avrageMonthVisit,
                "domain_authority" => $da,
                "screen_shot_featured" => $screen_shot_featured ?? null,
                "screen_shot_full_screen" => $screen_shot_full_screen ?? null,
                "facebook_share" => $facebookShare,
                "twitter_share" => $twitterShare,
                "pinterest_share" => $pintrestShare,
            ]);
            $noOfCoverage++;
        } // ending loop

        // update metrics
        $metrics = Metrics::create([
            'monthly_visit' => (int) $totalMonthVisit / (int) $noOfCoverage,
            'no_of_coverage' => $noOfCoverage,
            "average_domain_authority" => (int) $totalDomainAuthority / (int) $noOfCoverage,
            "social_share" => $socialShare,
        ]);
        $report->update(['metric_id' => $metrics->id]);

        $responseData = [
            'editUrl' => route('report.show', $report->id),
            'viewUrl' => $report->id,
            'name' => $report->name,
            'logo' => isset($report->logo) ? \Storage::url($report->logo) : null,
        ];
        if ($coverage) {
            return response([
                'status' => true,
                'data' => $responseData,
                'message' => "Report generate Successfully."
            ]);
        } else {
            return response([
                'status' => false,
                'message' => "Somthing went wrong."
            ]);
        }
    }
    //-------------------------------------------------------------------------

    /**
     * Calculate Average View
     *
     * @param  $data
     * @return $avrageMonthView
     */
    public function averageView($data)
    {
        $pageViewData = [];
        if (isset($data['HistoricalData']['Data'])) {
            $pageViewData = $data['HistoricalData']['Data'];
        }
        $count = 1;
        $totalPageView = 0;
        foreach ($pageViewData as $pageView) {
            $totalPageView += (int) $pageView['PageViews']['PerMillion'];
            $count++;
        }
        $avrageMonthView = (int) $totalPageView / (int) $count;
        return (int) $avrageMonthView ?? 0;
    }
    //-------------------------------------------------------------------------


    /**
     * get Domain Authority
     *
     * @param  $data
     * @return $avrageMonthView
     */
    public function getDA($url)
    {
        $daRes = Http::withBasicAuth(
            config('constants.MOZ_ACCESS_ID'),
            config('constants.MOZ_SECRET_KEY')
        )->post("https://lsapi.seomoz.com/v2/linking_root_domains", [
            'target' => $url,
            'target_scope' => "page",
            'limit' => 1,
        ])->body();
        $daRes = json_decode($daRes, true);

        if (isset($daRes['results'][0]['domain_authority'])) {
            return $daRes['results'][0]['domain_authority'];
        }
        return null;
    }
    //-------------------------------------------------------------------------


    /**
     * get Domain Authority
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function showReport($id)
    {
        $report =  Report::with(['coverages', 'metrics'])->findOrFail($id);
        return view('client.report.show', compact('report'));
    }
    //-------------------------------------------------------------------------
}
