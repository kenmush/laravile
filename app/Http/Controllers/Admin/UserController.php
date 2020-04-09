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
use App\Repositories\PlanRepository;
use Newsletter;

class UserController extends Controller
{

    public function __construct(UsersRepository $userRepo,PlanRepository $planRepo){
        $this->userRepo = $userRepo;
        $this->planRepo = $planRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] =  $this->userRepo->model()::with('activePlan')->paginate(10);
        return view('admin.listUser',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['plans'] = $this->planRepo->model()::get();
        return view('admin.addUser',$data);

    }


    public function export(){
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
        // try{
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
                    unset($input['_token']);
                    unset($input['password_confirmation']);
                    $this->userRepo->model()::where('email',$input['email'])->update($input);
                    return redirect()->back()->with('success','User Added Succesfully!');
                }else{
                    $this->userRepo->model()::create([
                        'plan_id' => $input['plan_id'],
                        'name' =>  $input['name'],
                        'email' => $input['email'],
                        'role_id' => $input['role_id'],
                        'password' => Hash::make($input['password']),
                    ]);
                    $this->mailChimp($request);
                    return redirect()->back()->with('success','User Added Succesfully!');
                }

            }else
            {
                return redirect()->back()->with('failure','Password did not match')->withInput();
            }
        // }
        // catch(\Exception $e){
        //     return redirect()->back()->with('failure','Someting Went Wrong!');
        // }

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
        $data['users'] =  $this->userRepo->model()::with('activePlan')->paginate(10);
        return view('admin.listUser',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['plans'] = $this->planRepo->model()::get();
        $data['users'] =  $this->userRepo->model()::with('activePlan')->find($id);
        return view('admin.addUser',$data);
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
            if($data['password'] == null){
                $user = $this->userRepo->model()::find($id);
                $data['password'] = $user['password'];
                unset($data['password_confirmation']); 
                $this->userRepo->model()::where('id',$id)->update($data);
                return redirect()->back()->with('success','Profile Detail Update Success!');
            }else{     
                if($data['password'] == $data['password_confirmation'] ){
                    $data['password'] = Hash::make($data['password']);
                    unset($data['password_confirmation']);
                    $this->userRepo->model()::where('id',$id)->update($data);
                    return redirect()->back()->with('success','Profile Detail Update Success!');
                }
                else{
                    return redirect()->back()->with('failure','Confirm Password did not match');
                }
            }

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
        $user =  $this->userRepo->model()::destroy($id);
        if($user)
            return redirect()->back()->with('success','User Delete Success!');
    }
}
