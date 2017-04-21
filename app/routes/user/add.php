<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$app->get('/add-device',$authenticated(), function () use ($app)
{
   // $type = $app->type->where('type')->get();
    $types = Capsule::table('type')->get();
    var_dump($types);
    $app->render('user/add.php',['types' => $types]);

    //$app->flash('global', 'You have been logged out');
    //return $app->response->redirect($app->urlFor('home'));
})->name('add');

$app->post('/add-device',$authenticated(), function () use ($app)
{
    $request = $app->request;

    $name = $request->post('name');
    $type = $request->post('menu-type');

    $v = $app->validation;

    $v->validate([
        'name' => [$name, 'required|alnumDash|max(20)']
        ]);

    $unit = Capsule::table('type')->where('id_type','=',$type)->min('unit');

    if ($v->passes()) {
        $app->device->create([
            'device_name' => $name,
            'id_type' => $type,
            'user_id' => $_SESSION[$app->auth->user],
            'unit' => $unit

        ]);

        $app->flash('global', 'Device has been added!');
        return $app->response->redirect($app->urlFor('home'));
    }

    $app->render('user/add.php',[
        'errors' => $v->errors(),
        'request' => $request,
    ]);

})->name('add.post');