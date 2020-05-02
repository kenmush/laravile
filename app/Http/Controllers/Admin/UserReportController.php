<?php

namespace App\Http\Controllers\Admin;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;
use App\Exports\ReportExport;
use App\Models\Client;
use App\Models\Report;
use App\User;

class UserReportController extends Controller
{

    public function __construct(ReportRepository $reportRepo)
    {
        $this->reportRepo = $reportRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['users'] = User::all();
        $data['clients'] = Client::all();
        $userId = $request->user;
        $clientId = $request->client;

        $data['report'] = Report::when(!empty($userId), function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->when(!empty($request->client), function ($q) use ($clientId) {
            $q->where('client_id', $clientId);
        })->paginate(10);

        return view('admin.reportUser', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Excel::download(new ReportExport, 'ReportList.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $update = $this->reportRepo->model()::where('id', $input['id'])
                ->update(['is_sharing_active' => $input['check']]);
            return response()->json('Update Success!!');
        } catch (\Exception $e) {
            return response()->json('Someting went wrong!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $data['users'] = User::all();
        $data['clients'] = Client::all();
        $userId = $request->user;
        $clientId = $request->client;

        $data['report'] = Report::when(!empty($userId), function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->when(!empty($request->client), function ($q) use ($clientId) {
            $q->where('client_id', $clientId);
        })->paginate($id);
        return view('admin.reportUser', $data);
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
    public function destroy($id)
    {
        //
    }
}
