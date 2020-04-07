<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\SettingRepository;
use Newsletter;

class MailSettingController extends Controller
{
    public function __construct(SettingRepository $mailRepo){
        $this->mailRepo = $mailRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keys = $this->mailRepo->model()::pluck('key');
        $values = $this->mailRepo->model()::pluck('value');
        $data = [];
        foreach($keys as $key=>$keys){
            $data[preg_replace('/[^A-Za-z0-9_\-]/', '', $keys)] = $values[$key];
        }
        return view('admin.mailSetting',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        unset($input['_token']);
        foreach($input['value'] as $key => $i){
            if($this->mailRepo->model()::where('key',$key)->exists()){
                $this->mailRepo->model()::where('key',$key)->update(['value'=>$i]);
            }else{
                $this->mailRepo->model()::create(['name'=>'Mailchimp','key'=>$key,'value'=>$i]);
            }
        }

        // set env stripe
        $this->mailRepo->setEnvVariables($input);

        return redirect()->back()->with('success','Mail Information Update Success');
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
