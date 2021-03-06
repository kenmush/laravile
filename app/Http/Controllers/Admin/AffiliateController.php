<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promotor\Promotor;
use App\Promotor\PromotorUser;
use App\Promotor\Payout;
use App\Promotor\AffiliateTracker;
use Exception;
use Illuminate\Pagination\Paginator;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['promotor'] = Promotor::with('promotorSalesInfo')->paginate(10);
        return view('admin.affiliates.index',$data);
    }

    public function statistic($id){

        $data['name'] = Promotor::where('id',$id)->pluck('name');
        $data['sales'] = PromotorUser::with('paymentInfo')
        ->where('promotor_id',$id)
        ->paginate(10);
        $promotor = Promotor::find($id);
        $url = url('/').$promotor->affiliate_url;
        $data['track'] = AffiliateTracker::with('view','user')->where('affiliate_url',$url)->get();
        return view('admin.affiliates.affiliate_stat',$data);
    }

    public function payout($id=null){

        $pagination = 10;
        if($id)
             $pagination = $id;

        $data['payouts'] = Payout::paginate( $pagination );
        return view('admin.affiliates.payout',$data);

    }

    public function changeStatus(Request $request ,$id){
        try{

            Payout::where('id',$id)->update(['status' => $request->status]);
            return redirect()->back()->with('success', 'You have successfully Changed');

        }catch(\Exception $e){
            return redirect()->back()->with('failure', 'Something went wrong'.$e);
        }

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
        $affiliate =  Promotor::destroy($id);
        if($affiliate)
            return redirect()->back()->with('success','User Delete Success!');
    }
}
