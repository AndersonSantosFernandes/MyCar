<?php
session_start();

$db_name = "manageCar";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";


$conn = new PDO("mysql:dbname=" . $db_name . "; host=" . $db_host, $db_user, $db_pass);

function invertDate($date, $separate = "-", $join = "/" ){
    return implode($join, array_reverse(explode($separate, $date)));
}

function formatMoney($valor, $separa = ".", $junta = ","){

    return implode($junta,explode($separa, $valor));
}

?>

