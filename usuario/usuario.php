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
  <div class="container">
    <div class="row">
      <div class="col-md-9">
      <center>
       <p>Nombre de usuario: <?php echo $user->usuario; ?></p>
       <p>Rol en la página: <?php echo $rol ?></p>
      </div>
      </center>
    </div>
  </div>



<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php';  ?>