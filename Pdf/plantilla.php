<?php
require 'FPDF\fpdf.php';
class PDF extends FPDF{

Function Header()
{


    $this -> SetFont ('Arial', 'B' , 15);
    $this -> Cell (30);
    $this -> Cell (120,20, 'Reportes' ,0,0, 'C');
    $this -> Ln (20);
}
function Footer (){

$this -> SetY (-15);
$this -> SetFont ('Arial', 'I', 8);
$this -> Cell (0,10, 'Pagina '.$this -> PageNo().'/{nb}',0,0, 'C');
}

}
?>