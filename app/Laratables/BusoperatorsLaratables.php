<?php

namespace App\Laratables;

class BusOperatorsLaratables
{
    public static function laratablesCustomAction($busOperator)
    {
        return view('bus-operators.index_action', compact('busOperator'))->render();
    }

}
