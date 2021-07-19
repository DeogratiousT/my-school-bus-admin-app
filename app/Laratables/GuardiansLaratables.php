<?php

namespace App\Laratables;

class GuardiansLaratables
{
    public static function laratablesCustomAction($guardian)
    {
        return view('guardians.index_action', compact('guardian'))->render();
    }

}
