<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\User;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = auth()->user()->childMembers;
        return view('client.members.index', compact('users'));
    }
    //-------------------------------------------------------------------------

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Gate::denies('create-team')) {
            return redirect()->route('team-members.index')->with('failure', "Please upgade plan");
        }

        return view('client.members.create');
    }
    //-------------------------------------------------------------------------

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parentUser = auth()->user();

        if (\Gate::denies('create-team')) {
            return redirect()->route('team-members.index')->with('failure', "Please upgade plan");
        }
        if ($request->hasFile('profile_pic')) {
            $imagePath = \Storage::put('logo', $request->profile_pic);
        } else {
            $imagePath = null;
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile_picture' => $imagePath,
        ]);

        if ($parentUser->no_of_users != 0) {
            auth()->user()->update([
                'no_of_users' => $parentUser->no_of_users - 1
            ]);
        }

        TeamMember::create([
            'parent_user_id' => $parentUser->id,
            'child_user_id' => $user->id,
        ]);

        return redirect()->route('team-members.index')->with('success', 'Member Added.');
    }
    //-------------------------------------------------------------------------
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
    //-------------------------------------------------------------------------

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
    //-------------------------------------------------------------------------

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
    //-------------------------------------------------------------------------

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->parent->id == auth()->user()->id) {
            $user->delete();
        } else {
            abort(403);
        }

        TeamMember::where('child_user_id', $id)->delete();
        return redirect()->route('team-members.index')->with('success', 'Member Delete.');
    }
    //-------------------------------------------------------------------------
}
