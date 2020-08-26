<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeningQuestionsAnswers extends Model
{
    public $table = "listening_questions_answers";
    protected $fillable = [
        'answer', 'userid', 'quizzesid'
    ];
}
