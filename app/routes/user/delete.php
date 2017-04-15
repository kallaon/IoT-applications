<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$app->get('/delete/:id', $authenticated(), function ($id) use($app)
{
        Capsule::table('device_value')->where('id_device','=',$id)->delete();
        Capsule::table('device')->where('id_device','=',$id)->delete();

    return $app->response->redirect($app->urlFor('devices'));

})->name('delete');