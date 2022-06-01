<?php

namespace App\Models;

use Eloquent;

class StudentPersonalInfo extends Eloquent
{


    protected $fillable = ['std_id','blood_id','father_name','mother_name','dob','nid','gender','birth_place','guardian_name',
        'permanent_address','present_address','post_office','post_office2','student_contact_no','guardian_contact_no','skills','tribal','fighter'];


}
