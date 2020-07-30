<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParagraphQuestion extends Model
{
    //
    protected $table = 'paragraph_questions';


    protected $fillable = [
        'Question','Answerid','quizid'
    ];
}
