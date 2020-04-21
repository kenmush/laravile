<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Promotor\PromotorUser;
use App\Models\Client;
use App\Models\PaymentHistoryLog;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // incresing percentage per month
        $previousMonth = User::orderBy('created_at', 'DESC')
        ->whereDate('created_at', '<', \Carbon\Carbon::now()->subMonth())
        ->get()->count();

        $thisMonth = User::orderBy('created_at', 'DESC')
        ->whereDate('created_at', '>', \Carbon\Carbon::now()->subMonth())
        ->get()->count();

        $a =  $thisMonth - $previousMonth;

        $thisMonth == 0 ? $b = 0 : $b =  $a / $thisMonth;
        $data['increasingPer'] = $b * 100;

        // earning current month
        $amount = PaymentHistoryLog::where('amount_refunded',0)
        ->whereMonth('created_at', \Carbon\Carbon::now()->month)
        ->pluck('amount')
        ->toArray();

        $data['totalEarning'] = (float)(array_sum($amount) / 100);

        // total clients
        $data['totalClients'] = Client::get()->count();

        // total users
        $data['total_user'] = User::get()->where('role_id',2)->count();

        // sales
        $totalSales = PaymentHistoryLog::where('amount_refunded',0)
        ->pluck('amount')->toArray();
        $affiliateCount = PromotorUser::
        join('payment_history_logs as p','Promotor_user.payment_id','p.id')
        ->where('has_refund',0)
        ->pluck('amount')->toArray();
        
        $directCount =  array_sum($totalSales) - array_sum($affiliateCount);
        $refererCount = 0;
        $data['directSale'] = $directCount/100;        
        $data['affiliateSale'] =  array_sum($affiliateCount) / 100;        
        $data['refererSale'] =  $refererCount / 100; 
        return view('admin.dashboard',$data);
    }

    public function MonthlyEarning($year=null){
        $currentYear = \Carbon\Carbon::now()->year;

        if($year)
            $currentYear = $year;

        $data['earning'] = PaymentHistoryLog::selectRaw('SUM(amount) as count, YEAR(created_at) year, MONTH(created_at) month')
        ->groupBy('year', 'month')
        ->whereYear('created_at', $currentYear )
        ->get();

        $data['month'] = array(
            1 => "Jan",
            2 => "Feb",
            3 => "Mar",
            4 => "Apr",
            5 => "May",
            6 => "Jun",
            7 => "Jul",
            8 => "Aug",
            9 => "Sep",
            10 => "Oct",
            11 => "Nov",
            12 => "Dec"
        );

        return $data;
    }

    public function salesStat(){
        $totalSales = PaymentHistoryLog::where('amount_refunded',0)
        ->get()->count();
        $affiliateCount = PromotorUser::where('has_refund',0)
        ->get()->count();
        $directCount =  $totalSales - $affiliateCount;
        $refererCount = 0;
        $data['directSale'] = round((($directCount / $totalSales) * 100),2);        
        $data['affiliateSale'] =  round((($affiliateCount / $totalSales) * 100),2);        
        $data['refererSale'] =  round((($refererCount / $totalSales) * 100),2); 
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
