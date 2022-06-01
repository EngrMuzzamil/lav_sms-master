<?php

namespace App\Models;


use Eloquent;


class StudentCourseInfo extends Eloquent
{


    protected $fillable = ['department_id','course_id','faculty_id','student_name','roll_no','registration_no','degree_id','admission_date','failed_credit_exam'	,'remarks','readmission'];


}
