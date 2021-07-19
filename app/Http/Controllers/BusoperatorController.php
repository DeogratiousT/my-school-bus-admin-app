<?php

namespace App\Http\Controllers;

use App\Busoperator;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\BusoperatorsLaratables;

class BusoperatorController extends Controller
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
            return Laratables::recordsOf(Busoperator::class, BusoperatorsLaratables::class);
        }
        return view('busoperators.index');
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
        Busoperator::create($request->validate([
            'name' => 'required',
            'phone' => 'required',
            'busNo' => 'required',
            'nationalId' => 'required',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Busoperator  $busoperator
     * @return \Illuminate\Http\Response
     */
    public function show(Busoperator $busoperator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Busoperator  $busoperator
     * @return \Illuminate\Http\Response
     */
    public function edit(Busoperator $busoperator)
    {
        return view('busoperators.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Busoperator  $busoperator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Busoperator $busoperator)
    {
        Busoperator::update($request->validate([
            'name' => 'required',
            'phone' => 'required',
            'busNo' => 'required',
            'nationalId' => 'required',
        ]));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Busoperator  $busoperator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Busoperator $busoperator)
    {
        $busoperator->delete();
        return redirect()->route('busoperators.index')->with('success', 'Deleted Successfully');
    }
}
