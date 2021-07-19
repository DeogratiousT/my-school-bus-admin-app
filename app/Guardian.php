<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = ['name','phone','email','nationalId'];

    public function pupils(){
        return $this->belongsToMany('App\Pupil');
    }
}
