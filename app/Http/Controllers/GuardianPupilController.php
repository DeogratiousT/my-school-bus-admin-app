<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuardianPupil;
use App\Pupil;
use App\Guardian;
use DB;

class GuardianPupilController extends Controller
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

    public function showGuardian($id){
        $guardian = Guardian::find($id);
        return view('guardians.linkpupil',['guardian'=> $guardian]);
    }

    public function showPupil($id){
        $pupil = Pupil::find($id);
        return view('pupils.linkparent',['pupil'=> $pupil]);
    }

    public function storeGuardian(Request $request ){
        GuardianPupil::create(
            $request->validate([
                'pupil_id' => 'required',
                'guardian_id' => 'required|unique:guardian_pupil,guardian_id',
            ])
        );

        return redirect()->route('pupils.show', $request->pupil_id)->with('success', 'Parent-Pupil link created successfully');
    }

    public function storePupil(Request $request ){
        GuardianPupil::create(
            $request->validate([
                'pupil_id' => 'required|unique:guardian_pupil,pupil_id',
                'guardian_id' => 'required',
            ])
        );

        return redirect()->route('parents.show', $request->guardian_id)->with('success', 'Pupil-Parent link created successfully');
    }

    public function destroyGuardian($pupil_id, $guardian_id){

        DB::table('guardian_pupil')->where([
            ['guardian_id', $guardian_id ],
            ['pupil_id', $pupil_id ],
        ])->delete();

        return redirect()->route('pupils.show', $pupil_id)->with('success', 'Pupil-Parent Link removed successfully');

    }

    public function destroyPupil($guardian_id, $pupil_id){

        DB::table('guardian_pupil')->where([
            ['guardian_id', $guardian_id ],
            ['pupil_id', $pupil_id ],
        ])->delete();

        return redirect()->route('parents.show', $guardian_id)->with('success', 'Pupil-Parent Link removed successfully');
        
    }
}
