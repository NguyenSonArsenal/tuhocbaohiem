<?php

namespace App\Models;

use App\Models\Auth\AuthTmp;

class Teacher extends AuthTmp
{
    protected $table = 'teachers';

    protected $fillable = [
        'full_name', 'email', 'phone', 'description', 'avatar',
    ];
}
