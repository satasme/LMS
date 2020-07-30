<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortAnsQuiz extends Model
{
    public $table = "short_answer_quzes";
    protected $fillable=[
        'question','quizid','correctanswerid'
    ];
}
