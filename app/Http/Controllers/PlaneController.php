<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Models;
use App\Models\Plane\Plane;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plane::get();

        return view('plane.index', ['planes' => $planes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $planes = Plane::all();
        $colum = DB::select("show columns from `plane` ");
        $enums = [];
        foreach ($colum as $type){
            if($type->Field === 'plane_type'){
                $enums = str_replace('enum(', '', $type->Type);
                $enums = str_replace("'", '',$enums);
                $enums = substr($enums, 0, -1);
                $enums = explode(',', $enums);
            }
        }
    
        
        return view('plane.create', ['plane' => $enums]);
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
            'company'       => 'required',
            'plane_type'      => 'required',
            'plane_no' => 'required'
        );

        $validator = \Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('plane/create')
                ->withErrors($validator);
        } else {
            // store
            $plane = new Plane;
            $plane->plane_uuid = \Uuid::generate(4)->string;
            $plane->company       = Input::get('company');
            $plane->plane_type      = Input::get('plane_type');
            $plane->plane_no = Input::get('plane_no');
            $plane->save();

            // redirect
            \Session::flash('message', 'Successfully created plane!');
            return \Redirect::to('plane');
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
        $plane = Plane::find($id);
        return view('plane.show', ['plane' => $plane]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colum = DB::select("show columns from `plane` ");
        $enums = [];
        foreach ($colum as $type){
            if($type->Field === 'plane_type'){
                $enums = str_replace('enum(', '', $type->Type);
                $enums = str_replace("'", '',$enums);
                $enums = substr($enums, 0, -1);
                $enums = explode(',', $enums);
            }
        }

        $plane = Plane::find($id);
        return view('plane.edit', ['plane_types' => $enums, 'plane' => $plane]);
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
            'company'       => 'required',
            'plane_type'      => 'required',
            'plane_no' => 'required'
        );

        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('plane/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $plane = Plane::find($id);
            $plane->company       = Input::get('company');
            $plane->plane_type      = Input::get('plane_type');
            $plane->plane_no = Input::get('plane_no');
            $plane->save();

            // redirect
            \Session::flash('message', 'Successfully updated Plane!');
            return \Redirect::to('plane');
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
        $plane = Plane::find($id);
        $plane->delete();

        // redirect
        \Session::flash('message', 'Successfully deleted the plane!');
        return \Redirect::to('plane');
    }
}
