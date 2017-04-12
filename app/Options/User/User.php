<?php

namespace Options\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $table = 'user';

    protected $fillable = [
        'email',
        'name',
        'password',
        'api_key',
    ];


}