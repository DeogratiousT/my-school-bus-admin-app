<?php

namespace App\Laratables;

class PupilsLaratables
{
    public static function laratablesCustomAction($pupil)
    {
        return view('pupils.index_action', compact('pupil'))->render();
    }

}
