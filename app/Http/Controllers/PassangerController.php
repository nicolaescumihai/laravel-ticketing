<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Models;
use App\Models\Passanger\Passanger;
use Illuminate\Support\Facades\Input;

class PassangerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passangers = Passanger::get();

        return view('passanger.index', ['passangers' => $passangers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passanger.create');
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
            'first_name'       => 'required',
            'last_name'      => 'required',
            'nationality' => 'required',
            'nationality' => 'required'
        );

        $validator = \Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('passanger/create')
                ->withErrors($validator);
        } else {
            // store
            $passanger = new Passanger;
            $passanger->passanger_uuid = \Uuid::generate(4)->string;
            $passanger->first_name       = Input::get('first_name');
            $passanger->last_name      = Input::get('last_name');
            $passanger->nationality = Input::get('nationality');
            $passanger->id_card = Input::get('id_card');
            $passanger->save();

            // redirect
            \Session::flash('message', 'Successfully created passanger!');
            return \Redirect::to('passanger');
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
        $passanger = Passanger::find($id);
        return view('passanger.show', ['passanger' => $passanger]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passanger = Passanger::find($id);
        return view('passanger.edit', ['passanger' => $passanger]);
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
            'first_name'       => 'required',
            'last_name'      => 'required',
            'nationality' => 'required',
            'nationality' => 'required'
        );

        $validator = \Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('passanger/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $passanger =  Passanger::find($id);
            $passanger->first_name       = Input::get('first_name');
            $passanger->last_name      = Input::get('last_name');
            $passanger->nationality = Input::get('nationality');
            $passanger->id_card = Input::get('id_card');
            $passanger->save();
            // redirect
            \Session::flash('message', 'Successfully updated passanger!');
            return \Redirect::to('passanger');
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
        $passanger = Passanger::find($id);
        $passanger->delete();

        // redirect
        \Session::flash('message', 'Successfully deleted the passanger!');
        return \Redirect::to('passanger');
    }
}
