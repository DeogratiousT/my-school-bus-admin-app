<?php

namespace App\Http\Controllers;

use App\Guardian;
use App\Pupil;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\GuardiansLaratables;
use App\Laratables\PupilsLaratables;

class GuardianController extends Controller
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
            return Laratables::recordsOf(Guardian::class, GuardiansLaratables::class);
        }
        return view('guardians.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guardians.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        Guardian::create(
            $request->validate([
                'name' => 'required',
                'phone' => 'required|unique:guardians,phone',
                'email' => 'required|unique:guardians,email',
                'nationalId' => 'required|unique:guardians,nationalId'
            ])
        );

        $guardian = Guardian::where('nationalId',$request->nationalId)->first();

        return redirect()->route('parents.show',['guardian'=>$guardian])->with('success', $request->name.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guardian = Guardian::find($id);
        return view('guardians.show',['guardian'=> $guardian]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $guardian = Guardian::find($id);
        return view('guardians.edit',['guardian'=> $guardian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guardian = Guardian::find($id);
        $guardian->update($request->validate([
            'name' => 'required',
            'phone' => 'required|unique:guardians,phone',
            'email' => 'required|email|unique:guardians,email',
            'nationalId' => 'required|unique:guardians,nationalId'
        ]));
         
        return redirect()->route('parents.show',['guardian' => $guardian])->with('success',$request->name.' details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $guardian = Guardian::find($id);
        $guardian->delete();
        return redirect()->route('parents.index')->with('success','Parent deleted successfully');
    }
}
