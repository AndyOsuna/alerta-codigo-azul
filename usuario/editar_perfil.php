<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/alarma.php';

if (isset($_POST['oldpass'])) {
  if ($_POST['oldpass'] != '') {
    $pass1 = $_POST['oldpass'];
    $pass2 = $_POST['newpass1'];
    $pass3 = $_POST['newpass2'];
    if ($pass2 != $pass3) {
      $msg = 'Las nuevas contraseñas no coinciden';
    } else {
      $query = $mysqlconn->query("SELECT * FROM usuarios WHERE id = $id");
      if ($query == false) {
        die('err');
      }
      $row = $query->fetch_assoc();

      if ($row['password'] != $pass1) {
        $msg = 'Contraseña incorrecta';
      } else {
        $query = $mysqlconn->query("UPDATE usuarios SET `password` = '$pass2' WHERE id = $id");
        if ($query == false) {
          $msg = 'La contraseña no se ha podido actualizar';
        } else {
          $successmsg = 'Contraseña cambiada correctamente.';
        }
      }
    }
  }
}
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
<br>
<div class="container py-5">
  <div class="row">
    <div class="col-md-12">
      <?php if (isset($successmsg)) { ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong><?php echo $successmsg; ?></strong>
        </div>

      <?php } ?>

      <?php if (isset($msg)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong><?php echo $msg; ?></strong>
        </div>

      <?php } ?>
      <div class="card card-header">
        <center>Complete el formulario</center>
      </div>
      <div class="card card-body">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="form-group">
            <input type="password" name="oldpass" class="form-control" placeholder="Contraseña anterior" required>
          </div>
          <div class="form-group">
            <input type="password" name="newpass1" class="form-control" placeholder="Nueva Contraseña" required>
          </div>
          <div class="form-group">
            <input type="password" name="newpass2" class="form-control" placeholder="Repite Contraseña" required>
          </div>
          <button type="submit" class="btn btn-success btn-block">Cambiar contraseña</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';  ?>