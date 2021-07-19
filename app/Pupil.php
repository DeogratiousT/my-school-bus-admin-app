<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    protected $fillable = ['name', 'admissionNo', 'grade'];

    public function guardians(){
        return $this->belongsToMany('App\Guardian');
    }

}
