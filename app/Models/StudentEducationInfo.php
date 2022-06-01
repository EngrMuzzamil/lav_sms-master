<?php

namespace App\Models;

use Eloquent;

class StudentEducationInfo extends Eloquent
{

    protected $fillable = ['std_id','exam','edu_type','dept','institute','roll_no','registration','session','result'];


}
