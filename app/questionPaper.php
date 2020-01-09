<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questionPaper extends Model
{
    protected $table='questionpaper';
    protected $fillable=['fk_classid','fk_subjectid','year','questionpaper',];

}
