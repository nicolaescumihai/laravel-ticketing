<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airport\Airport;
use App\Http\Controllers\Models;
use Illuminate\Support\Facades\Input;

class airportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airport = Airport::all();

        return \View::make('airport.index')->with('airport', $airport);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('airport.create');
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
            'airport_name'       => 'required',
            'airport_short_name'      => 'required',
            'airport_location' => 'required'
        );

        $validator = \Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('airport/create')
                ->withErrors($validator);
        } else {
            // store
            $airport = new Airport;
            $airport->airport_uuid = \Uuid::generate(4)->string;
            $airport->airport_name       = Input::get('airport_name');
            $airport->airport_short_name      = Input::get('airport_short_name');
            $airport->airport_location = Input::get('airport_location');
            $airport->save();

            // redirect
            \Session::flash('message', 'Successfully created Airport!');
            return \Redirect::to('airport');
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
        $airport = Airport::find($id);
        return view('airport.show', ['airport' => $airport]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airport = Airport::find($id);
        return view('airport.edit', ['airport' => $airport]);
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
            'airport_name'       => 'required',
            'airport_short_name'      => 'required',
            'airport_location' => 'required'
        );

        $validator = \Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('airport/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $airport = Airport::find($id);
            $airport->airport_name       = Input::get('airport_name');
            $airport->airport_short_name      = Input::get('airport_short_name');
            $airport->airport_location = Input::get('airport_location');
            $airport->save();

            // redirect
            \Session::flash('message', 'Successfully updated Airport!');
            return \Redirect::to('airport');
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
        $airport = Airport::find($id);
        $airport->delete();

        // redirect
        \Session::flash('message', 'Successfully deleted the airport!');
        return \Redirect::to('airport');
    }
}
