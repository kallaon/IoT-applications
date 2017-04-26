<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$app->get('/dashboard', $authenticated(), function () use($app)
{

    $session = $_SESSION[$app->auth->user];


    $device = Capsule::select('SELECT device.id_device,device.user_id,device.id_type,device.device_name,device.updated_at,device.created_at,device.unit,type.device_name as type_name FROM device INNER JOIN type ON device.id_type = type.id_type WHERE user_id = "'.$session.'"');
    $types = Capsule::table('type')->get();
    $dashboard_type = Capsule::select('select * from dashboard_type');
    $dashboard_board = Capsule::select('select * from w_dashboard where user_id = "'.$session.'"');

    $test[] = $session;

    //TODO: tu nacitame premenne k pripojeniu do DB z config/database.php a z config\development.php
    $my_server = $app->config->get('db.host');
    $my_db = $app->config->get('db.name');
    $my_usr = $app->config->get('db.username');
    $my_pass = $app->config->get('db.password');
    //TODO: tu je funckie na pripojnie k db
    function connect_db($server, $user, $pass, $database) {

        $connection = new mysqli($server, $user, $pass, $database);

        return $connection;
    }




    $ideto[] = "";
    $devko[] = "";
    $db = connect_db($my_server, $my_usr, $my_pass, $my_db); //TODO pripojenie k db
    $result = $db->query( 'select * from w_dashboard where user_id = "'.$session.'"' ); //TODO: select co nacita vsetky prihlaseneho pouzivatela widgety

    $kolko = 0;
    while ( $row = $result->fetch_array(MYSQLI_ASSOC) ) {

        $ideto[] = ""; //TODO: potrebujeme na ocistenie premenej
        $data[] = $row;

        if($row['name'] == "Min"){ //TODO: podmienka ktora zobrazuje widget s nazvom Min (pozor, rozlisuje male a velke pismena) v tabulke dashboard_type je to stlpec name

            $resulta = $db->query( 'SELECT min(device_val) as min FROM device_value where id_device = "'.$row['device_id'].'"' );
            $min = $resulta->fetch_array(MYSQLI_ASSOC);


            $devko = $devko + array (
                    $row['id']  => array(
                        "device_name" => $row['device_name'],
                        "size" => $row['size'],
                        "style" => $row['style'],
                        "icon" => $row['icon'],
                        "device_id" => $row['id'],
                        "text" => $row['text'],
                        "value" => $min['min'],
                        "time" => "",
                        "unit" => $row['unit'],
                        "id" => $row['id'],
                    ),
                );

        }elseif($row['name'] == "Max"){
            $resulta = $db->query( 'SELECT max(device_val) as max FROM device_value where id_device = "'.$row['device_id'].'"' );
            $max = $resulta->fetch_array(MYSQLI_ASSOC);
            $devko = $devko + array (
                    $row['id']  => array(
                        "device_name" => $row['device_name'],
                        "size" => $row['size'],
                        "style" => $row['style'],
                        "icon" => $row['icon'],
                        "device_id" => $row['id'],
                        "text" => $row['text'],
                        "value" => $max['max'],
                        "time" => "",
                        "unit" => $row['unit'],
                        "id" => $row['id'],
                    ),
                );


        }elseif($row['name'] == "Last"){
            $resulta = $db->query( 'SELECT device_val as last, created_at  FROM device_value where id_device = "'.$row['device_id'].'" ORDER BY created_at desc limit 1' );
            $max = $resulta->fetch_array(MYSQLI_ASSOC);
            $devko = $devko + array (
                    $row['id']  => array(
                        "device_name" => $row['device_name'],
                        "size" => $row['size'],
                        "style" => $row['style'],
                        "icon" => $row['icon'],
                        "device_id" => $row['id'],
                        "text" => $row['text'],
                        "value" => $max['last'],
                        "time" => $max['created_at'],
                        "unit" => $row['unit'],
                        "id" => $row['id'],
                    ),
                );


        }elseif($row['name'] == "Graf"){


            $resulta1 = $db->query( 'SELECT device_val, created_at FROM device_value where id_device = "'.$row['device_id'].'" ORDER BY created_at' );
            $max = $resulta1->fetch_array(MYSQLI_ASSOC);


            $result2 = $db->query( 'SELECT device_val, created_at FROM device_value where id_device = "'.$row['device_id'].'" ORDER BY created_at' );
            unset($ideto);
            while ( $row1 = $result2->fetch_array(MYSQLI_ASSOC) ) {
                $ideto[] = $row1;
            }

            $gra = json_encode($ideto);

            //echo var_dump($ideto);

            $devko = $devko + array (
                    $row['id']  => array(
                        "device_name" => $row['device_name'],
                        "size" => $row['size'],
                        "style" => $row['style'],
                        "icon" => $row['icon'],
                        "device_id" => $row['id'],
                        "text" => $row['text'],
                        "value" => $gra,
                        "time" => $max['created_at'],
                        "unit" => $row['unit'],
                        "id" => $row['id'],
                    ),
                );


        }
        //TODO: ak by si chcel pridat dalsi widget tak do tabulky dashboard_type dopln udaje a rozsir podmienku
        $kolko++;
    }




    //TODO: toto co ide nizzsie je ak nemas nastaveny ziadny widget tak sa ti zobrazi upozornenie
    if($kolko == 0){

        $devko = array (
            $row['id']  => array(
                "device_name" => "No widget set",
                "size" => "3",
                "style" => "panel-danger",
                "icon" => "fa-info-circle",
                "device_id" => "5",
                "text" => "No widget set",
                "value" => "",
                "time" => "",
                "unit" => "",
                "id" => "xx",
            ),
        );

    }else{

    }




    //echo var_dump($devko);
    //echo var_dump($ideto);

    unset($devko[0]); //TODO: tymto cistime chybovy zapis


    $app->render('user/dashboard.php',[
        'session' => $session,
        'device' => $device,
        'types' => $types,
        'dashboard_type' => $dashboard_type,
        'dashboardx' => $dashboard_board,
        'dev_dev' => $devko
    ]);

})->name('dashboard');