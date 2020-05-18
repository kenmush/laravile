<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = auth()->user()->tickets;
        return view('client.ticket.index', compact('tickets'));
    }
    //-------------------------------------------------------------------------

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.ticket.create');
    }
    //-------------------------------------------------------------------------

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        if ($ticket->user_id != auth()->id()) {
            abort(403);
        }
        return view('client.ticket.view',compact('ticket'));
    }
    //-------------------------------------------------------------------------


    /**
     * handel create ticket form.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $images = null;
        if ($request->has('attachments') && is_array($request->attachments)) {
            $images = implode(",", $request->attachments);
        }
        Ticket::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
            'images' => $images,
        ]);
        return redirect()->route('ticket.index')->with('success', 'Ticket is created.');
    }
    //-------------------------------------------------------------------------

    /**
     * handel drop zone image upload.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function imageUpdate(Request $request)
    {
        if ($request->hasFile('file')) {
            return \Storage::put('ticket', $request->file);
        }
        return response(['status' => false]);
    }
    //-------------------------------------------------------------------------
}
