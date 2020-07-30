<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diagramquizes extends Model
{
    //
    
    protected $table = 'diagramquizes';


    protected $fillable = [
        'blank','correctlabel','diagramid'
    ]; 
}
