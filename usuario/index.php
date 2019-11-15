<?php
include_once '../includes/header.php';
include_once '../includes/alarma.php';
?>

<div class="container py-5">
  <div class="col-md-6 mx-auto">
    <div class="card">
      <div class="card-header">
        <p class="h4 my-1 text-center">Herramientas y datos</p>
      </div>
      <div class="list-group">
        <a class="list-group-item list-group-item-action" href="/usuario/usuario.php"><strong>Datos de perfil</strong></a>
        <a class="list-group-item list-group-item-action" href="/usuario/editar_perfil.php"><strong>Cambiar contraseña</strong></a>

      </div>
    </div>
  </div>
</div>


<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>