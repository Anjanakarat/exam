<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answerTable extends Model
{
     protected $table = 'answertable';
    protected $fillable = ['fk_examid','fk_questionid','useranswer','status',];
}
