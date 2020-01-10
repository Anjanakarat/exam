<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function questions()
    {
        return $this->hasMany(ExamQuestions::class, 'fk_exam_id')->select(['fk_question_id', 'id']);
    }
}
