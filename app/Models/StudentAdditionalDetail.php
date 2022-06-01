<?php

namespace App\Models;

use App\User;
use Eloquent;

class StudentAdditionalDetail extends Eloquent
{
    public $timestamps = false;
    protected $fillable = ['std_id','field_name', 'value'];



}
