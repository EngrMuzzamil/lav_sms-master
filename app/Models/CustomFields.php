<?php

namespace App\Models;
use Eloquent;

class CustomFields extends Eloquent
{
    public $timestamps = false;
    protected $fillable = ['name','type','options'];


}
