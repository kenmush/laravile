<?php

namespace App\Http\Controllers\Admin;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UserRequest;
use Newsletter;

class UserController extends Controller
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
        $data['users'] =  $this->userRepo->model()::orderBy('id','DESC')->paginate(10);
        return view('admin.listUser',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Excel::download(new UserExport,'UserList.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
        try{
            if( $this->userRepo->model()::where('email',$input['email'])->exists()){
                return redirect()->back()->with('failure','Email already exists ')->withInput();
            }
            if($input['password'] == $input['password_confirmation']){
                $post = $this->userRepo->model()::withTrashed()
                ->where('email',$input['email'])
                ->exists();

                if($post){
                    $this->userRepo->model()::withTrashed()
                    ->where('email',$input['email'])
                    ->restore();
                }else{
                    $this->userRepo->model()::create([
                        'name' =>  $input['name'],
                        'email' => $input['email'],
                        'role_id' => $input['role_id'],
                        'password' => Hash::make($input['password']),
                    ]);
                    $this->mailChimp($request);
                }
                return redirect()->back()->with('success','User Added Succesfully!');
            }else
            {
                return redirect()->back()->with('failure','Password did not match')->withInput();
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('failure','Someting Went Wrong!');
        }

    }


    public function mailChimp($request){
        Newsletter::delete($request->email);
        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email);
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
        $user =  $this->userRepo->model()::destroy($id);
        if($user)
            return redirect()->back()->with('success','User Delete Success!');
    }
}
