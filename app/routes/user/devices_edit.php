<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$app->get('/devices_edit/:dev_name', $authenticated(), function ($dev_name) use($app)
{
    $session = $_SESSION[$app->auth->user];


        $device = Capsule::select('SELECT * FROM device WHERE device_name = "'.$dev_name.'"');
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

        Capsule::select('UPDATE device SET device_name = "'.$name.'",  WHERE device_name = "'.$dev_name.'" AND ');

        $app->flash('global', 'Device has been updated!');
        return $app->response->redirect($app->urlFor('devices'));
    }

    $app->render('user/add.php',[
        'errors' => $v->errors(),
        'request' => $request,
    ]);

})->name('edit.post');