<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pupil;

class GradeController extends Controller
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
    
    public function incrementGrade($id){
        $pupil = Pupil::find($id);
        $currentGrade = $pupil->grade;
        $grades = array("Baby-Class", "Nursery", "Pre-Unit", "1", "2", "3", "4", "5", "6", "7", "8");
        $arrlength = count($grades);

        for($x = 0; $x < $arrlength; $x++) {
            if($grades[$x] == $currentGrade){
                $next = $grades[$x+1] ;

                $pupil->grade = $next;

                $pupil->save();

            }
        }

        return redirect()->route('pupils.show',$pupil)->with('success',$pupil->name .' grade was incremented to '.$next);
    }

    public function decrementGrade($id){
        $pupil = Pupil::find($id);
        $currentGrade = $pupil->grade;
        $grades = array("Baby-Class", "Nursery", "Pre-Unit", "1", "2", "3", "4", "5", "6", "7", "8");
        $arrlength = count($grades);

        for($x = 0; $x < $arrlength; $x++) {
            if($grades[$x] == $currentGrade){
                $prev = $grades[$x-1] ;

                $pupil->grade = $prev;

                $pupil->save();

            }
        }

        return redirect()->route('pupils.show',$pupil)->with('success',$pupil->name .' grade was incremented to '.$prev);
    }
}
