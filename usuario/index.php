<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/header.php'; 
include $_SERVER['DOCUMENT_ROOT'].'/includes/alarma.php';?>

<br>
  <div class="container pt-5">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-header">
          <p class="h4 my-1 text-center">Herramientas y datos</p>
        </div>
        <div class="list-group">
          <a class="list-group-item list-group-item-action" href="/usuario/usuario.php">Datos de perfil</a>
          <a class="list-group-item list-group-item-action" href="/usuario/datos.php">Datos generales</a>
          <a class="list-group-item list-group-item-action" href="/usuario/editar_perfil.php">Cambiar contraseña</a>
          
        </div>
      </div>
  </div>



<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php';  ?>