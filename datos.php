<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/header.php';


$resultados = mysqli_query($mysqlconn, "SELECT ubicacion, paciente, tipo, TIMESTAMPDIFF(SECOND, fecha_hora, fecha_hora_atendido) AS 'tiempo' FROM llamados WHERE `atendido` = 1");

echo "
    <table border='1'>
    <tr> 
        <th>Ubicación</th>
        <th>Paciente</th>
        <th>Tipo</th>
        <th>Tiempo de respuesta</th>
    </tr> 
";

while ($row = $resultados->fetch_array()) {
    echo "<tr>";
    echo "<td>" .$row['ubicacion'] . "</td>";
    echo "<td>" .$row['paciente'] . "</td>";
    echo "<td>" .$row['tipo'] . "</td>";
    echo "<td>" .$row['tiempo'] . "</td>";
    echo "</tr>";
}

echo "</table>";


?>