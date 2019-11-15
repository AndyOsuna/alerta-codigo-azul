<?php
$host = "localhost";

$mysql = new mysqli($host, "root", "", "bd_codigoazul");

if ($mysql->connect_error) {
    echo 'Capo, no conecta<br>', $mysql->connect_error;
    exit();
}
?>
