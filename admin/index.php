<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; 
  if($isAdmin){
?>
<div class="container py-5">
  <div class="col-md-6 mx-auto">
    <div class="card">

      <div class="card-header">
        <p class="h4 my-1 text-center">Funciones de administrador</p>
      </div>

      <!-- <div class="card-body"> -->
        <div class="list-group">
          <a href="usuarios.php" class="list-group-item list-group-item-action"><strong>Usuarios</strong></a>
          <a href="zonas.php" class="list-group-item list-group-item-action"><strong>Zonas</strong></a>
          <a href="registrarPaciente.php" class="list-group-item list-group-item-action "><strong>Pacientes</strong></a>
          <a href="registrarEnfermero.php" class="list-group-item list-group-item-action "><strong>Personal de salud</strong></a>
          <a href="/pdf/reporte.php" class="list-group-item list-group-item-action "><strong>Informe de pacientes</strong></a>
         
          <!-- <a href="listUsers.php" class="list-group-item list-group-item-action ">Ver y modificar los <strong>Usuarios</strong></a>
          <a href="listPacientes.php" class="list-group-item list-group-item-action ">Ver todos los <strong>Pacientes</strong></a> -->
        </div>
      <!-- </div> -->

    </div> <!-- Cierra div 'card' -->
  </div> <!-- Cierra div 'col-md-6' -->
  <div class="col-md-9">
  </div>
</div>



  <?php } else include_once '../includes/templates/isntAdmin.html';
   include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';  ?>