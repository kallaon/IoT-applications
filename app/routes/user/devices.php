<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$app->get('/devices/:id', $authenticated(), function ($id) use($app)
{
    $session = $_SESSION[$app->auth->user];

    if($id == ":id"){
        //device.active neexistuje
        //$device = Capsule::select('SELECT device.id_device,device.user_id,device.id_type,device.device_name,device.updated_at,device.created_at,device.active,device.unit,type.device_name as type_name FROM device INNER JOIN type ON device.id_type = type.id_type WHERE user_id = "'.$session.'"');
        $device = Capsule::select('SELECT device.id_device,device.user_id,device.id_type,device.device_name,device.updated_at,device.created_at,device.unit,type.device_name as type_name FROM device INNER JOIN type ON device.id_type = type.id_type WHERE user_id = "'.$session.'"');
        //$min = Capsule::select('SELECT MIN(device_val) FROM device_value WHERE id_device = "'.$id.'"');
        // $min = Capsule::select('SELECT MIN(device_val) FROM device_value');
        //$test = Capsule::select('SELECT max(device_value.device_val) FROM device_value JOIN device ON device_value.id_device = device.id_device WHERE device_value.id_device =11 ');
        // var_dump($test);

        $types = Capsule::table('type')->get();


        $app->render('user/devices_main.php', [
            'id_dev' => $id,
            'session' => $session,
            'device' => $device,
            'types' => $types,
        ]);
    }else{

        //$devicer = Capsule::select('SELECT * FROM device WHERE id_device = "'.$id.'"');
        $devicer = $app->device->where('id_device', $id)->first();

        //graph
        $today = Capsule::table('device_value')->where('id_device', $id)->whereDate('created_at',Capsule::raw('CURDATE()'))->get()->count();
        $total = Capsule::table('device_value')->where('id_device', $id)->get()->count();
        var_dump($today);
        $devtype = $app->type->where('id_type', $devicer['id_type'])->first();
        $dev_val = Capsule::table('device_value')->where('id_device','=',$id)->latest()->limit(10)->get();
        //$dev_val = Capsule::select('SELECT LAST(device_val) FROM device_value WHERE id_device = "'.$id.'"');
        $tabulka = Capsule::select('SELECT device_val,created_at FROM device_value WHERE id_device = "'.$id.'"');


        $min = Capsule::table('device_value')->where('id_device','=',$id)->min('device_val');
        $max = Capsule::table('device_value')->where('id_device','=',$id)->max('device_val');
        $avg = round(Capsule::table('device_value')->where('id_device','=',$id)->avg('device_val'),2);
        $unit = Capsule::table('device')->where('id_device','=',$id)->min('unit');
        //$unit = Capsule::table('device')->select('unit')->where('id_device','=',$id)->get();
        //var_dump($tabulka);
       //var_dump($dev_val);
        $unit1 = $unit;
        if($unit == "c"){
            $unit1 = "°C";
        }elseif($unit == "p"){
            $unit1 = "%";
        }elseif($unit == "b"){
            $unit1 = "bar";
        }
        //$test = "aho \" jky";
        $sajz = "{\"device_val\":\"-33\",\"created_at\":\"2017-04-16 10:19:28\"},{\"device_val\":\"66\",\"created_at\":\"2018-04-16 10:19:28\"}";
        //var_dump($sajz);
        //echo("aho \" jky");
        $app->render('user/devices.php',
            [
                'id_dev' => $id,
                'min' => $min,
                'max' => $max,
                'avg' => $avg,
                'unit' => $unit1,
                'device' => $devicer,
                'type' => $devtype,
                'dev_val' => $dev_val,
                'tab' => json_encode($tabulka),
                'today' => $today,
                'total' => $total,


            ]);


    }


})->name('devices');



$app->post('/devices',$authenticated(), function () use ($app)
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
        return $app->response->redirect($app->urlFor('devices'));
    }

    $app->render('user/devices.php',[
        'errors' => $v->errors(),
        'request' => $request,
    ]);
})->name('add_device.post');

$app->post('/devices/',$authenticated(), function () use ($app)
{
    $request = $app->request;

    $type_name = $request->post('type_name');
    $shortcut = $request->post('shrt_name');

    $v = $app->validation;

    $v->validate([
        'type_name' => [$type_name, 'required|alnum|max(10)'],
        'shrt_name' => [$shortcut, 'required|alpha|min(1)|max(3)']
    ]);
    if ($v->passes()) {
        Capsule::table('type')->insert(['device_name' => $type_name, 'unit' => $shortcut]);
        $app->flash('global', 'New type has been succesfuly created!');
    }
    else
    {
        $app->render('user/devices.php',[
            'errors' => $v->errors(),
            'request' => $request,
        ]);
    }
    return$app->response->redirect($app->urlFor('devices'));



})->name('add_type.post');