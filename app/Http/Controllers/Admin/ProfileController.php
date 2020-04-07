<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfileController extends Controller
{
    public function __construct(UsersRepository $userRepo){
        $this->userRepo = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['profile'] = $this->userRepo->model()::find(Auth::user()->id);
        return view('admin.profile',$data);
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

        try{
            $data = $request->all();

            if($request->hasFile('profile_picture')){
                $imageName = time() .'.'. $request->profile_picture->getClientOriginalExtension();
                $filePath = \Storage::put('public/logo', $request->profile_picture);
                $data['profile_picture'] = $filePath;
            }
            if($data['password'] !== null){
                $data['password'] = Hash::make($data['password']);
            }
            unset($data['_token']);
            unset($data['_method']);
            if($data['password'] == null){
                $user = $this->userRepo->model()::find($id);
                $data['password'] = $user['password'];
            }
            $this->userRepo->model()::where('id',$id)->update($data);

            if($request['password'] !== null || $request['role_id'] == 2){
                Auth::logout();
                return redirect()->route('admin.login')->with('success','Profile Detail Update Success!');
            }
            return redirect()->back()->with('success','Profile Detail Update Success!');

        } catch(\Exception $e){
            return redirect()->back()->with('failure','Profile Detail Save Fail!');
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
        //
    }
}
