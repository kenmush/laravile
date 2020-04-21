<?php

namespace App\Http\Controllers\Promotor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promotor\Promotor;
use App\Promotor\PromotorUser;
use Browser;
use App\Promotor\AffiliateTracker;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\PayoutRequest;
use Auth;
use App\Promotor\Payout;
use Exception;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['promotor'] = Promotor::withCount('promotorUser')->find(auth('promotor')->id());
        return view('promotor.affiliates.index',$data);
    }


    public function sales( $id=null )
    {
        if($id){
            $data['sales'] = PromotorUser::with('paymentInfo')
            ->where('promotor_id',\Auth::user()->id)
            ->paginate($id);
        }else{
            $data['sales'] = PromotorUser::with('paymentInfo')
            ->where('promotor_id',\Auth::user()->id)
            ->paginate(10);
        }

        return view('promotor.affiliates.sales',$data);
    }

    public function payout( $id=null )
    {
        $pagination = 10;
        if($id){
            $pagination = $id;
        }
        $promotor = Promotor::where('id',auth('promotor')->id())->first();
        
        $item = PromotorUser::where('has_refund',0)
        ->where('promotor_id',auth('promotor')->id())
        ->get();
        $countTotalEarning = 0;
        foreach($item as $d){
            $countTotalEarning += $d->earn_value;
        }
      
        // count total earning requested
        $payout = Payout::where('promotor_id',auth('promotor')->id())
        ->get();

        $countTotalEarningRequest = 0;
        foreach($payout as $d){
            $countTotalEarningRequest += $d->amount;
        }

        $total = ((double)$countTotalEarning - (double)$countTotalEarningRequest);
        preg_match('/E/',$total,$match);
        $match ? $total = 0 : $total =  $total;
        $promotor->earning = $total;
        $promotor->update();

        $data['totalEarning'] = $promotor->earning;
        // dd($data['totalEarning']);

        $data['payouts'] = Payout::where('promotor_id',auth('promotor')->id())->paginate( $pagination );

        return view('promotor.affiliates.payout',$data);
    }

    public function payoutStore(PayoutRequest $request){
        try{
            $input = $request->all();
            $input['promotor_id'] = auth('promotor')->id();
            Payout::create($input);
            return back()->with('success','Payment Request Created Successfully');
            
        }catch(\Exception $e){
            return back()->with('failure','Something went Wront'.$e)->withInput();
        }
    }

    public function payoutDelete($id){
        $payout = Payout::destroy($id);
        if($payout)
            return redirect()->back()->with('success','Plan Delete Success!');
        else
            return redirect()->back()->with('failure','Plan Delete Unsuccessful!');
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

    public function affiliate(Request $request){

        $promotor = Promotor::where('affiliate_url','?ref='.$request->query('ref'))->first();
        // dd(Browser::isDesktop());
        // dd(Browser::isMobile());


        if(Browser::isMobile() == true){
            $device = 'mobile';
        }
        if(Browser::isDesktop() == true){
            $device = 'desktop';
        }
        if(Browser::isTablet() == true){
            $device = 'tablet';
        }
        if(Browser::isBot() == true){
            $device = 'bot';
        }

        if(Cookie::has('affiliate') || Cookie::has('track') ){

            $ref_url = json_decode(Cookie::get('affiliate'));

            if( $promotor->affiliate_url != $ref_url->affiliate_url){
                $token = rand();
                AffiliateTracker::create([
                    'token' =>  $token,
                    'affiliate_url' => url('?ref='.$request->query('ref')),
                    'ip_address' => \Request::ip(),
                    'browser' => Browser::browserName(),
                    'device' => $device,
                    'operating_system' => Browser::platformName()
                ]);
            }else{
                $token = Cookie::get('track');
            }
        }else{
            $token = rand();
            AffiliateTracker::create([
                'token' =>  $token,
                'affiliate_url' => url('?ref='.$request->query('ref')),
                'ip_address' => \Request::ip(),
                'browser' => Browser::browserName(),
                'device' => $device,
                'operating_system' => Browser::platformName()
            ]);
        }

        $promotor->increment('share',1);

        return redirect()->route('plan.index')
        ->withCookie(cookie('affiliate', $promotor ,60*24*30))
        ->withCookie(cookie('track', $token ,60*24*30));
    }
}
