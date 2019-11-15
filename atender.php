<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/header.php';

date_default_timezone_set('America/Buenos_Aires');

$id = $_GET['id'];
$hora = date("Y-m-d H:i:s");

$query = $mysqlconn->query("UPDATE llamados SET `atendido` = 1, `fecha_hora_atendido` = '$hora' WHERE id = $id");
if ($query == false){
    die('Ha ocurrido un error. DEP.');
}

header('Location: llamados.php');
?>

<?php
$resultados = mysqli_query($mysqlconn, "SELECT * FROM llamados WHERE `atendido` = 0");
if (mysqli_num_rows($resultados) == 0) {
  // No hay llamados en el momento.
} else {
  echo '
  <script> alert("CÓDIGO AZUL\nHay llamados pendientes por responder."); window.location.replace("/llamados.php"); </script>
  ';
}
?>