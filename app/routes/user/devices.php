<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$app->get('/devices/:id', $authenticated(), function ($id) use($app)
{
    $session = $_SESSION[$app->auth->user];

    if($id == ":id"){
        $device = Capsule::select('SELECT * FROM device WHERE user_id = "'.$session.'"');
       // nacita typy
        //var_dump($device);
        $types = Capsule::table('type')->get();

        $app->render('user/devices_main.php', [
            'id_dev' => $id,
            'session' => $session,
            'device' => $device,
            'types' => $types,
        ]);
    }else{
        $app->render('user/devices.php', [
            'id_dev' => $id
        ]);
    }


})->name('devices');

//DELETE FROM `device` WHERE `device`.`id_device` = 16
function deleteDevice($id_dev)
{
    Capsule::table('device')->where('id_device','=',$id_dev)->delete();
}

$app->post('/devices',$authenticated(), function () use ($app)
{
    $request = $app->request;

    $name = $request->post('name');
    $type = $request->post('menu-type');

    $v = $app->validation;

    $v->validate([
        'name' => [$name, 'required|alnumDash|max(20)']
    ]);

    if ($v->passes()) {
        $app->device->create([
            'device_name' => $name,
            'id_type' => $type,
            'user_id' => $_SESSION[$app->auth->user]
        ]);

        $app->flash('global', 'Device has been added!');
        return $app->response->redirect($app->urlFor('devices'));
    }

    $app->render('user/devices.php',[
        'errors' => $v->errors(),
        'request' => $request,
    ]);
})->name('add_device.post');