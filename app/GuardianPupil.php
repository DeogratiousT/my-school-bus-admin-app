<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuardianPupil extends Model
{
    protected $table = 'guardian_pupil';

    protected $fillable = ['pupil_id','guardian_id'];
}
