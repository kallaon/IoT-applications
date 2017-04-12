<?php

namespace Options\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DeviceValue  extends Eloquent
{
    protected $table = 'device_value';

    protected $fillable = [
        'device_val'
    ];
}