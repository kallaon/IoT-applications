<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$app->get('/values',$authenticated(), function () use ($app)
{
    // $type = $app->type->where('type')->get();
    $types = Capsule::table('type')->get();
    var_dump($types);
    $app->render('user/add.php',['types' => $types]);

    //$app->flash('global', 'You have been logged out');
    //return $app->response->redirect($app->urlFor('home'));
})->name('values');