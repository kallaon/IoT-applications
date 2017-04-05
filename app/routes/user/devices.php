<?php

$app->get('/devices', function () use ($app)
{
    // $type = $app->type->where('type')->get();
    //$types = Capsule::table('type')->get();
    //var_dump($types);
    //$app->render('user/devices.php',['types' => $types]);
    $app->render('user/devices.php');

    //$app->flash('global', 'You have been logged out');
    //return $app->response->redirect($app->urlFor('home'));
})->name('dev');