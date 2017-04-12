<?php

namespace Options\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Device extends Eloquent
{
    protected $table = 'device';

    protected $fillable = [
        'device_name',
        'user_id',
        'id_type',
    ];
}