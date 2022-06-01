<?php

namespace App\Models;

use App\User;
use Eloquent;

class Promotion extends Eloquent
{
    protected $fillable = ['std_id','session_id','semester_id'];


}
