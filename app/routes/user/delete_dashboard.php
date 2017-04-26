<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$app->get('/delete-dashboard/:id', $authenticated(), function ($id) use($app){

        Capsule::table('dashboard')->where('id','=',$id)->delete();

    return $app->response->redirect($app->urlFor('dashboard'));

})->name('delete-dashboard');