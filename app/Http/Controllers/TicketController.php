<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Models;
use App\Models\Ticket\Ticket;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::get();

        return view('ticket.index', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colum = DB::select("show columns from `ticket` ");
        $types = [];
        $status =[];
        foreach ($colum as $type){
            if($type->Field === 'ticket_type' ){
                $enums = str_replace('enum(', '', $type->Type);
                $enums = str_replace("'", '',$enums);
                $enums = substr($enums, 0, -1);
                $types = explode(',', $enums);
            }
            if($type->Field === 'ticket_status'){
                $enums = str_replace('enum(', '', $type->Type);
                $enums = str_replace("'", '',$enums);
                $enums = substr($enums, 0, -1);
                $status = explode(',', $enums);
            }
        }
    
        
        return view('ticket.create', ['type' => $types,'status'=>$status]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'ticket_type'       => 'required',
            'ticket_status'      => 'required',
        );

        $validator = \Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('ticket/create')
                ->withErrors($validator);
        } else {
            // store
            $ticket = new Ticket;
            $ticket->ticket_uuid = \Uuid::generate(4)->string;
            $ticket->ticket_type       = Input::get('ticket_type');
            $ticket->ticket_status      = Input::get('ticket_status');
            $ticket->save();

            // redirect
            \Session::flash('message', 'Successfully created ticket!');
            return \Redirect::to('ticket');
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
        $ticket = Ticket::find($id);
        return view('ticket.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colum = DB::select("show columns from `ticket` ");
        $types = [];
        $status =[];
        // dd($colum);
        foreach ($colum as $type){
            if($type->Field === 'ticket_type'){
                $enums = str_replace('enum(', '', $type->Type);
                $enums = str_replace("'", '',$enums);
                $enums = substr($enums, 0, -1);
                $types = explode(',', $enums);
            }
            if($type->Field === 'ticket_status'){
                $enums = str_replace('enum(', '', $type->Type);
                $enums = str_replace("'", '',$enums);
                $enums = substr($enums, 0, -1);
                $status = explode(',', $enums);
            }
        }

        // foreach ($colum as $status){
           
        // }

        $ticket = Ticket::find($id);
        return view('ticket.edit', [ 'types' => $types, 'status' => $status, 'ticket' => $ticket ]);
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
        $rules = array(
            'ticket_type'       => 'required',
            'ticket_status'      => 'required',
        );

        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('ticket/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $ticket = Ticket::find($id);
            $ticket->company       = Input::get('company');
            $ticket->plane_type      = Input::get('plane_type');
            $ticket->plane_no = Input::get('plane_no');
            $ticket->save();

            // redirect
            \Session::flash('message', 'Successfully updated ticket!');
            return \Redirect::to('ticket');
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
        $ticket = Ticket::find($id);
        $ticket->delete();

        // redirect
        \Session::flash('message', 'Successfully deleted the ticket!');
        return \Redirect::to('ticket');
    }
}
