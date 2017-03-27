<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'device';

    protected $fillable = [
        'device_name',
        'user_id',
        'id_type',
    ];
}
