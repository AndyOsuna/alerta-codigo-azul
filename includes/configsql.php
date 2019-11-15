<?php

session_start();
if (isset($_SESSION['connected'])) {
  if ($_SESSION['connected'] != true && $_SESSION['connected'] != false){
    if (!isset($loginvar)){
      header ('location: '.$_SERVER['DOCUMENT_ROOT'].'/login.php');
    }
  }
} else if (!isset($_SESSION['connected'])){
  $_SESSION['connected'] = false;
  if (!isset($loginvar)){
    header ('location: '.$_SERVER['DOCUMENT_ROOT'].'/login.php');
  }
}

if (!isset($_SESSION['user']) && !isset ($_SESSION['pass'])){
  $_SESSION['user'] = '';
  $_SESSION['pass'] = '';
}
/* Datos para la conexión con la base de datos */
$host = "localhost";
$user = "root";
$pass = "";
$db = "bd_codigoazul";

/* Objeto 'mysqli' de conexion a DB */
$mysqlconn = new mysqli($host, $user, $pass, $db);

if ($mysqlconn->connect_error) die($mysqlconn->connect_error);