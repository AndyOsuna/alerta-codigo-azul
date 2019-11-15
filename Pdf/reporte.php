<?php
include_once 'plantilla.php';
include_once 'Conexion.php';
    //enfermero
$query = "SELECT paciente, fecha_hora, fecha_hora_atendido, tipo, ubicacion FROM llamados AS m";
$resultado = $mysql->query($query);


$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf -> AddPage();

$pdf -> SetFillColor (232,232,232);
$pdf -> SetFont  ('Arial', 'B', 12);
$pdf -> Cell (45,6,'Paciente',1,0,'C',1);
$pdf -> Cell (40,6,'Fecha y hora',1,0,'C',1);
$pdf -> Cell (40,6,'Hora de atencion',1,0,'C',1);
$pdf -> Cell (25,6,'Tipo',1,0,'C',1);
$pdf -> Cell (45,6,'Ubicacion',1,0,'C',1);
$pdf -> Ln();

$pdf -> SetFont ('Arial','', 10);

while ($row = $resultado -> fetch_assoc())
{
$pdf -> Cell (45,6, utf8_decode ($row['paciente']),1,0,'C');
$pdf -> Cell (40,6, utf8_decode ($row['fecha_hora']),1,0,'C');
$pdf -> Cell (40,6, utf8_decode ($row['fecha_hora_atendido']),1,0,'C');
$pdf -> Cell (25,6, utf8_decode ($row['tipo']),1,0,'C');
$pdf -> Cell (45,6, utf8_decode ($row['ubicacion']),1,0,'C');
$pdf -> Ln();




}
$pdf -> Output();
?>