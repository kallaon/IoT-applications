<?php
/**
 * Created by PhpStorm.
 * User: Tomáš Bohuš
 * Date: 13. 4. 2017
 * Time: 21:32
 */

//nacitame nastavenia db
require_once('../app/config/include/Config.php');

//pripojime db
$db_con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//spravime pomocou mysqli vymazanie zariadenia
$s = "delete from device where id_device = '".$_GET['id']."'";
$q = $db_con->query($s);

//vymazeme aj informacie o s device_value pre dane zariadenie (uz ich nebude treba)
$s1 = "delete from device_value where id_device = '".$_GET['id']."'";
$q1 = $db_con->query($s1);

//presmerujeme naspat

header("location: ".$_SERVER['HTTP_REFERER']);
