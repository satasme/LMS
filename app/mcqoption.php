<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcqoption extends Model
{
    //
    protected $table = 'mcqoptions';


    protected $fillable = [
        'option_value','question_id'
    ];
}
