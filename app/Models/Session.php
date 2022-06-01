<?php

namespace App\Models;

use Eloquent;

class Session extends Eloquent
{
    protected $fillable = ['session_start', 'session_end'];
}
