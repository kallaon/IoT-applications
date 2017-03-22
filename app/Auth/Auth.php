<?php

namespace App\Auth;

use App\Models\User;

class Auth
{
    public  function user()
    {
        return ($this->check()) ? User::find($_SESSION['user']) : null;
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }

    public function attempt($name, $password)
    {
        $user = User::where('name',$name)->first();

        if (!$user){
            return false;
        }

        if (password_verify($password, $user->password))
        {
            $_SESSION['user'] = $user->id;
            return true;
        }
            return false;

    }

    public function logout()
    {
        unset($_SESSION['user']);
    }
}
