<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examTable extends Model
{
    protected $table = 'examtable';
    protected $fillable = ['fk_nameid','fk_classid','fk_subjectid',];
}
