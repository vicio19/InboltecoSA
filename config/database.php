
<?php

$server   = "localhost";
$username = "root";
$password = "";
$database = "inbolfac";


$mysqli = new mysqli($server, $username, $password, $database);


if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}

/********* conectar con la base de datos del Simec   */


$server2   = "localhost";
$username2 = "root";
$password2 = "";
$database2 = "sisinvprueba";


$mysqli2 = new mysqli($server2, $username2, $password2, $database2);


if ($mysqli2->connect_error) {
    die('error'.$mysqli2->connect_error);
}


?>