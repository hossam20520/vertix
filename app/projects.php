<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    //
    protected $primaryKey = 'id';

    protected $fillable = [
       'project_name' , 'project_meta' , 'description' , 'img' , 'client_name' ,
    ];
}
