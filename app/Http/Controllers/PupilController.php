<?php

namespace App\Http\Controllers;

use App\Pupil;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\PupilsLaratables;


class PupilController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            return Laratables::recordsOf(Pupil::class, PupilsLaratables::class);
        }
        return view('pupils.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = array("Baby-Class", "Nursery", "Pre-Unit", "1", "2", "3", "4", "5", "6", "7", "8");
        return view('pupils.create', ['grades'=>$grades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pupil::create($request->validate([
            'name' => 'required',
            'admissionNo' => 'required|unique:pupils,admissionNo',
            'grade' => 'required'
        ]));
         
        return redirect()->route('pupils.index')->with('success', $request->name.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pupil = Pupil::find($id);
        return view('pupils.show',['pupil'=> $pupil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grades = array("Baby-Class", "Nursery", "Pre-Unit", "1", "2", "3", "4", "5", "6", "7", "8");
        $pupil = Pupil::find($id);
        return view('pupils.edit', ['pupil'=> $pupil, 'grades'=>$grades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pupil = Pupil::find($id);
        $pupil->update($request->validate([
            'name' => 'required',
            'admissionNo' => 'required|unique:pupils,admissionNo',
            'grade' => 'required'
        ]));
         
        return redirect()->route('pupils.index')->with('success', $request->name.' details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pupil = Pupil::find($id);
        $pupil->delete();

        return redirect()->route('pupils.index')->with('success','Pupil Deleted');
    }
}
