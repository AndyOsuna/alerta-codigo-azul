<?php
$loginvar = true;

if (isset($_SESSION['userIdLogeado'])) {
  header('location: /');
}

require('includes/header.php');

/* Si el formulario se envió, entonces... */
if (isset($_POST['user']) && isset($_POST['pass'])) {
  /* purificamos las entradas */
  $_SESSION['user'] = $purifier->purify($_POST['user']);
  $_SESSION['pass'] = $purifier->purify($_POST['pass']);

  /* Comprobamos los datos de la DB de usuarios */
  $query = $mysqlconn->query('SELECT * FROM usuarios WHERE usuario = ("' . $_SESSION['user'] . '") AND password = ("' . $_SESSION['pass'] . '")');
  $row = $query->fetch_assoc();

  
  if (!$row) {
    $_SESSION['message'] = "No coinciden los datos";
    $_SESSION['connected'] = false;
  } else {
    $_SESSION['connected'] = true;
    $_SESSION['userIdLogeado'] = $row['id'];
  }
  if ($_SESSION['connected'] == true) {
    header('location: /');
  }
}

?>
<div class="container pt-5">
  <div class="row">
    <div class="col-md-6 mx-auto">

      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong><?= $_SESSION['message'] ?></strong> 
        </div>
        
      <?php unset($_SESSION['message']);
      } ?>
      <div class="card">
        
        <div class="card-header">
          <p class="h4 my-1 text-center">Login</p>
        </div>

        <div class="card-body">
          <? # $_SERVER['PHP_SELF'] se refiere a la dirección de este archivo 
          ?>
          <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
              <input class="form-control" type="text" name="user" placeholder="Nombre de usuario" required>
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="pass" placeholder="Contraseña" required>
            </div>
            <input class="btn btn-primary btn-block" type="submit" value="Enviar">
          </form>
        </div>

      </div> <!-- Termina el 'card' -->

    </div>
  </div>
</div> <!-- Fin de 'container' -->
<?php include_once 'includes/footer.php'; ?>