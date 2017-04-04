<?php

namespace Options\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Type extends Eloquent
{
    protected $table = 'type';

    protected $fillable = [
        'device_name',
    ];


}