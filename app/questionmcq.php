<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questionmcq extends Model
{
    protected $table='questionmcq';
    protected $fillable=['fk_class_id','fk_subject_id','question','optionA','optionB','optionC','optionD','correctanswer',];
}
