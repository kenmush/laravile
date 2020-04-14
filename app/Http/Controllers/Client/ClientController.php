<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\ClientRequest;
use App\Exports\ClientExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Client;
use Auth;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clients'] = Client::where('user_id', Auth::user()->id)->paginate(10);
        return view('client.client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.client.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $input = $request->all();
        try {
            if (Client::where('email', $input['email'])->exists()) {
                return redirect()->back()->with('failure', 'Email already exists ')->withInput($request->only('email', 'url'));
            }

            if ($input['password'] == $input['password_confirmation']) {

                $post = Client::withTrashed()
                    ->where('email', $input['email'])
                    ->exists();
                if ($post) {
                    Client::withTrashed()
                        ->where('email', $input['email'])
                        ->restore();
                    unset($input['_token']);
                    unset($input['password_confirmation']);
                    Client::where('email', $input['email'])->update($input);
                    return redirect()->back()->with('success', 'Client Added Succesfully!');
                } else {
                    if ($request->hasFile('logo')) {
                        $logo = \Storage::put('logo', $request->logo);
                    }

                    Client::create([
                        'name' =>  $input['name'],
                        'logo' =>  $logo ?? null,
                        'domain' =>  $input['domain'],
                        'user_id' =>  auth()->user()->id,
                        'email' => $input['email'],
                        'password' => Hash::make($input['password']),
                    ]);
                    return redirect()->route('client.report')->with('success', 'Client Added Succesfully!');
                }
            } else {
                return redirect()->back()->with('failure', 'Password did not match')->withInput($request->only('email', 'url'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', 'Someting Went Wrong!')->withInput($request->only('email', 'url'));
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
        $data['client'] = Client::find($id);
        return view('client.client.add', $data);
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
        try {
            $data = $request->all();

            unset($data['_token']);
            unset($data['_method']);
            if ($data['password'] == null) {
                $user = Client::find($id);
                $data['password'] = $user['password'];
                unset($data['password_confirmation']);
                Client::where('id', $id)->update($data);
                return redirect()->back()->with('success', 'Client Detail Update Success!');
            } else {
                if ($data['password'] == $data['password_confirmation']) {
                    unset($data['password_confirmation']);
                    $data['password'] = Hash::make($data['password']);
                    Client::where('id', $id)->update($data);
                    return redirect()->back()->with('success', 'Client Detail Update Success!');
                } else {
                    return redirect()->back()->with('failure', 'Client Confirm Password Did not Match!')->with($request->only('url', 'email'));
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', 'Client Detail Save Fail!')->with($request->only('url', 'email'));
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
        $client = Client::destroy($id);
        if ($client)
            return redirect()->back()->with('success', 'Client Delete Success!');
        else
            return redirect()->back()->with('failure', 'Client Delete Unsuccessful!');
    }

    public function Export()
    {
        return Excel::download(new ClientExport, 'ClientList.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }


    /**
     * Show report generate module
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report($id)
    {
        $client = Client::find($id);
        $domain = $client->domain;
        $url = "https://awis.api.alexa.com/api?Action=SitesLinkingIn&Count=5&ResponseGroup=SitesLinkingIn&Url=$domain";

        $res = Http::withHeaders([
            'x-api-key' => config('constants.ALEXA_TOKEN')
        ])->get($url)->body();
        $res = xmlToArray($res);

        $urls = [];
        if (isset($res['Results']['Result']['Alexa']['SitesLinkingIn']['Site'])) {
            $urls = $res['Results']['Result']['Alexa']['SitesLinkingIn']['Site'];
        }
        return view('client.client.report', compact('urls'));
    }
    //-------------------------------------------------------------------------
}
