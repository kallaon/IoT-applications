<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->get('/','App\Controllers\HomeController:index')->setName('home');

//GUEST

$app->group('', function (){

    //SIGN UP
    $this->get('/auth/signup','App\Controllers\Auth\AuthController:getSignUp')->setName('auth.signup');
    $this->post('/auth/signup','App\Controllers\Auth\AuthController:postSignUp');

    //SIGN IN
    $this->get('/auth/signin','App\Controllers\Auth\AuthController:getSignIn')->setName('auth.signin');
    $this->post('/auth/signin','App\Controllers\Auth\AuthController:postSignIn');



})->add(new \App\Middleware\GuestMiddleware($container));






//RIGHTS TO ROUTES

$app->group('', function (){

    //ADD DEVICE
    $this->get('/auth/add','App\Controllers\Auth\AuthController:getAddDevice')->setName('auth.add');
    $this->post('/auth/add','App\Controllers\Auth\AuthController:postAddDevice');

    //SIGN OUT
    $this->get('/auth/signout','App\Controllers\Auth\AuthController:getSignOut')->setName('auth.signout');

//CHANGE PASSWORD
    $this->get('/auth/password/change','App\Controllers\Auth\PasswordController:getChangePassword')->setName('auth.password.change');
    $this->post('/auth/password/change','App\Controllers\Auth\PasswordController:postChangePassword');

})->add(new \App\Middleware\AuthMiddleware($container));