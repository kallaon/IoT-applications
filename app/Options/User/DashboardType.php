<?php
namespace Options\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DashboardType extends Eloquent
{
    protected $table = 'dashboard';

    protected $fillable = [
        'user_id',
        'device_id',
        'type_id'
    ];
}