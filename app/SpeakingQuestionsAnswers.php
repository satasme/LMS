<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpeakingQuestionsAnswers extends Model
{
    public $table = "speaking_questions_answers";
    protected $fillable = [
        'answer_path', 'userid', 'quizzesid'
    ];
}
