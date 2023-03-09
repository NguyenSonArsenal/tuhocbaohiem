<?php

namespace App\Models;

use App\Models\Auth\AuthTmp;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends AuthTmp
{
    protected $table = 'users';

    use SoftDeletes;

    protected $fillable = [
        'name', 'phone', 'email', 'password'
    ];
}
