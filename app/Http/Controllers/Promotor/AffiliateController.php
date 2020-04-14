<?php

namespace App\Http\Controllers\Promotor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promotor\Promotor;
use App\Promotor\PromotorUser;
use Browser;
use App\Promotor\AffiliateTracker;
use Illuminate\Support\Facades\Cookie;

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
