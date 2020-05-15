<?php

namespace App\Http\Controllers\Client;

use App\client\UserFiles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomReport;
use App\Http\Requests\CustomReportRequest;
use App\Models\Client;
use App\Models\Report;
use Auth;
use Image;

class CoverageReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['reportCustom'] = CustomReport::where('user_id', Auth::user()->id)->get();
        return view('client.myreport.index', $data);
    }

    /**
     * Display a listing of the new.
     *
     * @return \Illuminate\Http\Response
     */
    public function new($client_id, Request $report)
    {
        $client = Client::findOrFail($client_id);
        $this->authorize('view', $client);
        $data['clientexists'] = Client::where('user_id', Auth::user()->id)->exists();
        return view('client.myreport.new', $data);
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
    public function store(CustomReportRequest $request)
    {
        try {
            $input = $request->all();
            $input['user_id'] = Auth::user()->id;
            $input['slug'] = $this->generate_slug($request->title, '_');
            if ($request->hasFile('cover')) {
                $filePath = \Storage::put('public/coverage/custom', $request->cover);
                $input['cover'] = $filePath;
            }
            $data = CustomReport::create($input);

            return redirect('coverage_report/' . $data->slug . '/' . $data->id . '/edit');
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', 'Someting went wrong' . $e);
        }
    }

    public function ajaxget($id)
    {
        $user_id = Auth::user()->id;
        $post = CustomReport::where('user_id', $user_id)
            ->where('id', $id)->first();
        return $post;
    }

    public function ajaxupdate($id, Request $request)
    {
        try {
            $user_id = Auth::user()->id;
            $post = CustomReport::where('user_id', $user_id)
                ->where('id', $id)->first();
            $post->html = $request['gjs-html'];
            $post->css = $request['gjs-css'];
            $post->update();
            // return redirect('coverage_report/'.$data->slug.'/'.$data->user_id.'/edit');
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', 'Someting went wrong' . $e);
        }
    }

    public function ajaxasset(Request $request)
    {
        if ($request->hasFile('files')) {
            foreach ($request['files'] as $f) {
                $files = \Storage::put('public/coverage/customassets', $f);

                $data['user_id'] = Auth::user()->id;
                $data['file'] = $files;
                try {
                    $info = UserFiles::create($data);
                    return $info;
                } catch (\Exception $e) {
                    return $e;
                }
            }
        }else{

            $url = $request->url;
            return $url;
            $url_to_image =  $url;
            $my_save_dir = 'images/';
            $filename = basename($url_to_image);
            $complete_save_loc = $my_save_dir.$filename;
            file_put_contents($complete_save_loc,file_get_contents($url_to_image));
            // $path = $request->url;
            // $filename = basename($path);
            // Image::make($path)->save(public_path('images/' . $filename));
            // $data['user_id'] = Auth::user()->id;
            // $data['file'] = 'images/'+$filename;
            // try {
            //     $info = UserFiles::create($data);
            //     return response()->json($info);
            // } catch (\Exception $e) {
            //     return $e;
            // }
        }
    }

    public function ajaxAssetGet()
    {
        $data = UserFiles::where('user_id', Auth::user()->id)->get();
        return $data;
    }


    public function getTemplate($temp)
    {
        $report['report'] =  Report::with(['coverages', 'metrics', 'videos'])->where('user_id', Auth::user()->id)->first();
        return view('client.template.' . $temp, $report);
    }

    public function ajaxReport($id)
    {
        $report =  Report::with(['coverages', 'metrics', 'videos'])
            ->where('id', $id)
            ->first();
            return response()->json($report);
    }

    private function generate_slug($str, $symbol)
    {
        $pageName = strtolower(preg_replace("![^a-z0-9]+!i", $symbol, $str));
        if (substr($pageName, -1) == '-') {
            $pageName = substr($pageName, 0, -1);
        }
        return $pageName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        $this->authorize('view', $client);
        $data['reportCustom'] = Report::has('coverage')->with('coverage')->where('client_id', $id)->get();
        $data['id'] = $id;
        return view('client.myreport.index', $data);
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
