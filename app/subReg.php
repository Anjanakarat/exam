<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subReg extends Model
{
    protected $table='subject';
    protected $fillable=['subjectid','subjectname'];
}
