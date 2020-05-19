<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\ClientRequest;
use App\Exports\ClientExport;
use App\Http\Controllers\Controller;
use App\Jobs\TakeScreenShot;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Client;
use App\Models\Coverage;
use App\Models\Metrics;
use App\Models\Plan;
use App\Models\Report;
use Auth;
use Illuminate\Support\Str;
use Nesk\Puphpeteer\Puppeteer;
use Illuminate\Support\Facades\Http;
use App\Models\CustomReport;
use App\Http\Requests\CustomReportRequest;
use App\Models\ReportCategory;
use DB;
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
        if (\Gate::denies('create-client')) {
            return redirect()->route('clients.index')->with('failure', "Please upgade plan");
        }

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
        $user = auth()->user();
        $activePlan = $user->activePlan;
        if (auth()->user()->parent) {
            $user = auth()->user()->parent;
            $activePlan = $user->activePlan;
        }
        $activePlan = Plan::find($activePlan->plan_id);

        if (\Gate::denies('create-client')) {
            return redirect()->route('clients.index')->with('failure', "Please upgade plan");
        }

        $input = $request->all();
        if (Client::where('email', $input['email'])->exists()) {
            return redirect()->back()->with('failure', 'Email already exists ')->withInput($request->only('email', 'url'));
        }

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

            if ($activePlan->clients != 0) {
                $user->update([
                    'no_of_clients' => (int) $user->no_of_clients - 1,
                ]);
            }
            $client = Client::create([
                'name' =>  $input['name'],
                'logo' =>  $logo ?? null,
                'domain' =>  $input['domain'],
                'user_id' =>  auth()->user()->id,
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            return redirect()->route('clients.index')->with('success', 'Client Added Succesfully!');
            // return redirect()->route('client.report', $client->id)->with('success', 'Client Added Succesfully!');
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

        $reports = Report::with('coverage')->where('client_id', $id)->get();

        return view('client.client.report', compact('urls', 'id', 'reports'));
    }
    //-------------------------------------------------------------------------

    /**
     * Generate report
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function generateReport(Request $request, $id)
    {
        $user = auth()->user();
        $activePlan = $user->activePlan;
        if (auth()->user()->parent) {
            $user = auth()->user()->parent;
            $activePlan = $user->activePlan;
        }
        $activePlan = Plan::find($activePlan->plan_id);
        if (\Gate::denies('create-report')) {
            return response([
                'status' => false,
                'data' => [],
                'message' => "Please upgade plan."
            ]);
        }

        //report generation
        $urlsArray = explode(',', $request->urls);
        $report = Report::create([
            "name" => $request->title,
            "user_id" => auth()->user()->id,
            "client_id" => $id,
            "style_id" => 1,
            "metric_id" => 0,
        ]);

        (int) $noOfCoverage = 0;
        (int) $totalDomainAuthority = 0;
        (int) $totalMonthVisit = 0;
        (int) $socialShare = 0;

        $duplicateUrlCount = 0;
        $arrayDuplicateCount = array_count_values($urlsArray);
        foreach ($arrayDuplicateCount as $url => $count) {

            if ($count > 1) {
                $duplicateUrlCount++;
            }
        }
        $uniqeArray = array_unique($urlsArray);
        $puppeteer = new Puppeteer();
        foreach ($uniqeArray as $url) {

            // adding http if not have
            if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                $url = "http://" . $url;
            }


            $screen_shot_featured =  "screenshot/" . rand() . "screen_shot_featured.jpeg";
            $screen_shot_full_screen =  "screenshot/" . rand() . "full_screen.jpeg";
            dispatch(new TakeScreenShot($url, $screen_shot_featured, $screen_shot_full_screen));


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
            $shareCount = Http::get("https://api.sharedcount.com/v1.0/?url=$url&apikey=$config")->body();
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
                "screen_shot_featured" => $screen_shot_featured,
                "screen_shot_full_screen" => $screen_shot_full_screen,
                "facebook_share" => $facebookShare,
                "twitter_share" => $twitterShare,
                "pinterest_share" => $pintrestShare,
            ]);
            $noOfCoverage++;
        } // ending loop

        if ($noOfCoverage == 0) {
            $noOfCoverage = 1;
        }
        // update metrics
        $metrics = Metrics::create([
            'monthly_visit' => (int) $totalMonthVisit / (int) $noOfCoverage,
            'no_of_coverage' => $noOfCoverage,
            "average_domain_authority" => (int) $totalDomainAuthority / (int) $noOfCoverage,
            "social_share" => $socialShare,
        ]);
        $report->update(['metric_id' => $metrics->id]);

        // report category
        foreach($request->category as $key => $c){
            $insert[$key]['report_id'] = $report->id;
            $insert[$key]['title'] = $c;
        }
        DB::table('report_categories')->insert($insert);

        //coverage report template information
        $input = $request->except(['urls', 'cover']);
        $input['user_id'] = Auth::user()->id;
        $input['slug'] = Str::slug($request->title, '_');
        $input['report_id'] = $report->id;
        if ($request->hasFile('cover')) {
            $filePath = \Storage::put('public/coverage/custom', $request->cover);
            $input['cover'] = $filePath;
        }
        $customReport = CustomReport::create($input);

        $responseDataBuilder = [
            'url' => url($id . '/coverage_report/' . $customReport->id),
            'report_id' => $customReport->report_id
        ];
        $responseData = [
            'editUrl' => "#",
            'viewUrl' => route('report.show', $report->id),
            'name' => $report->name,
            'logo' => isset($report->logo) ? \Storage::url($report->logo) : null,
        ];
        if ($noOfCoverage >= 1) {
            if ($activePlan->report != 0) {
                $user->update([
                    'no_of_reports' => (int) $user->no_of_reports - 1,
                ]);
            }

            return response([
                'status' => true,
                'redirectUrl' => $responseDataBuilder,
                'data' => $responseData,
                'duplicate' => "We have found $duplicateUrlCount duplicate url and removed.",
                'message' => "Report generate Successfully.",
                'duplicate_status' => $duplicateUrlCount,
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
        $result = parse_url($url);
        $url = $result['host'];

        $daRes = Http::withBasicAuth(
            config('constants.MOZ_ACCESS_ID'),
            config('constants.MOZ_SECRET_KEY')
        )->post("https://lsapi.seomoz.com/v2/url_metrics", [
            'targets' => [$url],
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
        $report =  Report::with(['coverages', 'metrics', 'videos'])->findOrFail($id);
        return view('client.report.show', compact('report'));
    }
    //-------------------------------------------------------------------------


    /**
     * delete report
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyReport($id)
    {
        $report =  Report::find($id);
        $metrics = Metrics::find($report->metric_id);
        $coverage = Coverage::where('report_id', $id)->first();
        if ($report) {
            $report->delete();
        }
        if ($metrics) {
            $metrics->delete();
        }
        if ($coverage) {
            $coverage->delete();
        }
        return response([
            'status' => true,
            'message' => "deleted successfully."
        ]);
    }
    //-------------------------------------------------------------------------

    /**
     * delete report
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $client = Client::find($request->id);
        if (!$client) {
            return response([
                'status' => false,
                'message' => "client not found."
            ]);
        }

        if ($client->status == 1) {
            $client->update([
                'status' => "0"
            ]);
        } else {
            $client->update([
                'status' => "1"
            ]);
        }
        return response([
            'status' => true,
            'message' => "client updated."
        ]);
    }
    //-------------------------------------------------------------------------
}
