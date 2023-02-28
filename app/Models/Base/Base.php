<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public $timestamps = true;

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
