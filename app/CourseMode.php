<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseMode extends Model
{
    //

    protected $table = 'coursemodes';


    protected $fillable = [
        'modeid','mode_title','description','icon'
    ]; 

}
