<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    protected $fillable = [
        'coursecode','coursename', 'shortdescription','longdescription'
    ];
}
