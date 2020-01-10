<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questionmcq extends Model
{
    protected $table = 'questionmcq';

    public function options()
    {
        return $this->hasMany(QuestionOptions::class, 'fk_question_id')->select(['id', 'option']);
    }
}
