<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$app->get('/devices_edit/:dev_name', $authenticated(), function ($dev_name) use($app)
{
    $session = $_SESSION[$app->auth->user];


        $device = Capsule::select('SELECT * FROM device WHERE id_device = "'.$dev_name.'"');
        //TODO: (TOMAS) nemozes dat do selectu where podla mena. Aj iny pouzivatel moze mat zariadenie s rovnakym nazvom. Zmenil som ti to na ID. V tom parametre s viewu som ti tam nabidoval id.
        $types = Capsule::table('type')->get();
        var_dump($device);
        $app->render('user/devices_edit.php', [

            'session' => $session,
            'dev' => $device,
            'types' => $types,
        ]);


})->name('edit');

$app->post('/devices_edit',$authenticated(), function () use ($app)
{

    $request = $app->request;

    $name = $request->post('name');
    $dev_name = $request->post('dev_name');
    $type = $request->post('menu-type');

    $v = $app->validation;

    $v->validate([
        'name' => [$name, 'required|alnumDash|max(20)']
    ]);

    if ($v->passes()) {

        //Capsule::select('UPDATE device SET device_name = "'.$name.'",  WHERE device_name = "'.$dev_name.'" AND ');
        Capsule::select('UPDATE device SET device_name = "'.$name.'", id_type = "'.$type.'" WHERE id_device = "'.$dev_name.'" ');
        //TODO: (TOMAS) nemozes dat do update where device_name ale id_device. Lebo je dost mozne, ze aj iny pouzivatel moze mat zaraidenie s rovnakym nazvom. A potom ho premenuje aj jemu.

        $app->flash('global', 'Device has been updated!');
        return $app->response->redirect($app->urlFor('devices'));
    }

    $app->render('user/add.php',[
        'errors' => $v->errors(),
        'request' => $request,
    ]);

})->name('edit.post');