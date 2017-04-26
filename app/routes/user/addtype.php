<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$app->post('/dashboard',$authenticated(), function () use ($app)
{
    $request = $app->request;

    $dev_id = $request->post('device-type');
    $type_id = $request->post('dt-type');

     // $unit = Capsule::table('type')->where('id_type','=',$type)->min('unit');

    //if ($v->passes()) {
     $app->dashboard_type->create([
         'device_id' => $dev_id,
         'type_id' => $type_id,
         'user_id' => $_SESSION[$app->auth->user]
     ]);

        $app->flash('global', 'Mini has been added!');
        return $app->response->redirect($app->urlFor('dashboard'));
    //}

    $app->render('user/dashboard.php',[
        'errors' => $v->errors(),
        'request' => $request,
    ]);

})->name('addtype.post');