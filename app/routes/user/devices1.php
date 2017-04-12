<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$app->get('/devices', $authenticated(), function () use($app)
{

    /*$types = Capsule::select(
        'SELECT device_val from device_value WHERE device_val =  ( SELECT MIN(device_val) FROM device_value )');

    /////////ide hore

    $types = Capsule::select(
         'SELECT device_name from device where user_id = 11 ');
    */
    $test = Capsule::select('SELECT max(device_value.device_val) FROM device_value JOIN device ON device_value.id_device = device.id_device WHERE device_value.id_device = 4 AND device.user_id = 4');
    // $types = $app->device->select('device_name');
    $min = Capsule::table('device_value')->min('device_val');
    $max = Capsule::table('device_value')->max('device_val');
    $avg = Capsule::table('device_value')->average('device_val');
    $all = Capsule::table('device_value')->select('device_val')->get();
    $avg = round($avg,2);

    $connect = mysqli_connect("localhost", "root", "", "bakalarka");
    $query = "SELECT `id_device`,`device_val` FROM `device_value` WHERE `id_device`= 11";
    $result = mysqli_query($connect, $query);
    $chart_data = '';
    //$result = $test;
    //echo $all;
    //$json_data = array();

    $chart_data = '';
while($row = mysqli_fetch_assoc($result))
{
 $chart_data .= "{ dev:'".$row["id_device"]."', val:".$row["device_val"]."},  ";
}
$chart_data = substr($chart_data, 0, -2);
   // var_dump($chart_data);

echo $chart_data;

    $latest = Capsule::table('device_value')->latest('created_at');

    //$types = Capsule::where('id_device','11')->min('device_val');


    $app->render('user/devices.php',
        ['min' => $min,
            'max' => $max,
            'avg' => $avg,
            'latest' => $latest,
            'all' => $chart_data,

        ]);
})->name('devices');

function getMin()
{


}