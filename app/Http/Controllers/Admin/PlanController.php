<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PlanRepository;
use App\Http\Requests\PlanRequest;
class PlanController extends Controller
{

    public function __construct(PlanRepository $planRepo){
        $this->planRepo = $planRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['plans'] = $this->planRepo->model()::paginate(6);
        return view('admin.listPlan',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addPlan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        try{
            $this->planRepo->model()::create($request->all());
            return redirect()->back()->with('success','Plan Added Successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('failure','Could not store plan!')->withInput();
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
        $data['plan'] = $this->planRepo->model()::find($id);
        return view('admin.addPlan',$data);
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
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            $this->planRepo->model()::where('id',$id)->update($data);
            return redirect()->back()->with('success','Plan Updated Successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('failure','Could not Update plan!');
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
        $plan = $plan = $this->planRepo->model()::destroy($id);
        if($plan)
            return redirect()->back()->with('success','Plan Delete Success!');
        else
            return redirect()->back()->with('failure','Plan Delete Unsuccessful!');
    }
}
