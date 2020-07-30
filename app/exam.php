<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    //
    protected $table = 'exam';


    protected $fillable = [
        'examcode','Exam_title','description','courseid','icon','coursetestid','coursename','coursetestname'
    ];
}
