<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$app->get('/devices/:id', $authenticated(), function ($id) use($app)
{
    $session = $_SESSION[$app->auth->user];

    if($id == ":id"){
        $device = Capsule::select('SELECT * FROM device WHERE user_id = "'.$session.'"');
       // var_dump($device);

        $app->render('user/devices_main.php', [
            'id_dev' => $id,
            'session' => $session,
            'device' => $device,
        ]);
    }else{
        $app->render('user/devices.php', [
            'id_dev' => $id
        ]);
    }


})->name('devices');

function getMin()
{


}