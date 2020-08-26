<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WritingQuestionsAnswers extends Model
{
    protected $table = 'writing_questions_answers';


    protected $fillable = [
        'quizzesid','userid','answer'
    ];
}
