<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contacts';


    protected $fillable = [
        'name','email','mobile_number','subject','diagram','message'
    ]; 

}
