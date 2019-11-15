<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/header.php'; 
include $_SERVER['DOCUMENT_ROOT'].'/includes/alarma.php';
  $rol = $user->isAdmin;
  if ($rol == 1){
    $rol = 'Administrador';
  } else if ($rol == 0){
    $rol = 'Usuario';
  } else if ($rol == 2){
    $rol = 'idk';
  }
?>

<br>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <div class="card-title h4 my-1">Datos personales</div>
          </div>
          <div class="card-body">
            <p>Nombre de usuario: <?php echo $user->usuario; ?></p>
            <p>Rol en la página: <?php echo $rol ?></p>

          </div>
        </div>
      </div>
    </div>
  </div>



<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php';  ?>