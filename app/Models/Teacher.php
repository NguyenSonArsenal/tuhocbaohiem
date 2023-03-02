<?php

namespace App\Models;

use App\Models\Auth\AuthTmp;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends AuthTmp
{
    protected $table = 'teachers';

    use SoftDeletes;

    protected $fillable = [
        'full_name', 'email', 'phone', 'description', 'avatar',
    ];
}
