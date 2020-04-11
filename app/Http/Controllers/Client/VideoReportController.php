<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
        // $res = Http::withHeaders([
        //     'Authorization' => 'e9fba03d-7375-4934-b19b-b83a3f5d0cf1'
        // ])->get('https://app.criticalmention.com/allmedia/search', [
        //     'start' => '2020-01-01 09:00:00',
        //     'end' => '2020-04-01 09:00:00',
        //     'requiredKeywords' => 'burger king'
        // ]);
        // return $res->json();
        return view('client.report.video');
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
            'languageCode' => 'en'
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
}
