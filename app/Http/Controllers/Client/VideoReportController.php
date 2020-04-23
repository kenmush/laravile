<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VideoReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('client.report.video', compact('reports'));
    }
    //-------------------------------------------------------------------------

    /**
     * get Video from mention api
     *
     * @return \Illuminate\Http\Response
     */
    public function getVideo(Request $request)
    {
        $formData =  [
            'start' => $request->start . ' 09:00:00',
            'end' => $request->end . ' 09:00:00',
            'requiredKeywords' => $request->requiredKeywords,
            'languageCode' => 'en',
            'cTV' => $request->ctv,
            'cRadio' => $request->cradio,
        ];
        // dd($formData);
        $res = Http::withHeaders([
            'Authorization' => 'e9fba03d-7375-4934-b19b-b83a3f5d0cf1'
        ])->get('https://app.criticalmention.com/allmedia/search', $formData);
        if ($res->json()) {
            $response = response([
                'status' => true,
                'data' => $res->json()
            ]);
        } else {
            $response = response([
                'status' => false,
                'data' => [],
                'message' => "No Data Found"
            ]);
        }
        return $response;
    }
    //-------------------------------------------------------------------------


    /**
     * get Video from mention api
     *
     * @return \Illuminate\Http\Response
     */
    public function addVideoToReport(Request $request)
    {
        $report = Report::find($request->reportId);
        ReportVideo::updateOrCreate([
            'report_id' => $report->id,
            'video_url' => $request->videoUrl
        ]);
        return response([
            'status' => true,
            'message' => 'Video added to report'
        ]);
    }
    //-------------------------------------------------------------------------
}
