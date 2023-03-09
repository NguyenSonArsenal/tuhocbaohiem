<?php

namespace App\Models;

use App\Models\Auth\AuthTmp;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends AuthTmp
{
    protected $table = 'contact';

    use SoftDeletes;

    const STATUS_REPLY = 1;
    const STATUS_WAITING = 2;

    protected $fillable = [
        'name', 'phone', 'email', 'message', 'message_reply', 'status'
    ];
}
