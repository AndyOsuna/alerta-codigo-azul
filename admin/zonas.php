<?php
include_once '../includes/header.php';

if($isAdmin){
if (isset($_POST['zona'])) {
  $zona = $_POST['zona'];
  # Si no está vacio... 
  if ($zona != "") {
    $mysqlconn->query("INSERT INTO salas (sala) VALUES ('$zona')");
    if ($mysqlconn->error) $_SESSION['errorZona'] = "Error al intentar guardar la zona en la base de datos";
    else $_SESSION['message'] = "Zona guarada con éxito";
  } else $_SESSION['errorZona'] = "Complete el campo";
}

/* Recibimos el ID de la sala que queremos borrar */
if (isset($_GET['deleteID'])) {
  if ($_GET['deleteID'] != null) {
    $id = $_GET['deleteID'];
    $mysqlconn->query("DELETE FROM salas WHERE id = $id");
    if ($mysqlconn->error) $_SESSION['errorZona'] = "Error al intentar borrar la zona";
    else $_SESSION['message'] = "La zona se ha eliminado con éxito";
    header("location: " . $_SERVER['PHP_SELF']);
  }
}

?>

<div class="container pt-5">
  <div class="row">
    <div class="col-md-6 mx-auto mb-4">
      <?php # Alerta de error 
      ?>
      <?php if (isset($_SESSION['errorZona'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong><?= $_SESSION['errorZona'] ?></strong>
        </div>
      <?php #Se borra la variable de sesión para que al recargar la página no siga la alerta
        unset($_SESSION['errorZona']);
      }
      # Alerta de mensaje de alguna acción realizada
      if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong><?= $_SESSION['message'] ?></strong>
        </div>
      <?php #Se borra la variable de sesión para que al recargar la página no siga la alerta
        unset($_SESSION['message']);
      } ?>
      <?php #FORMULARIO ?>
      <div class="card">
        <div class="card-header">
          <p class="h4 my-1 text-center">Cree una zona</p>
        </div>
        <div class="card-body">
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
              <input type="text" name="zona" class="form-control" placeholder="Nombre de la zona" required autofocus>
            </div>
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <?php # Consulta para mostrar todas las salas 
      ?>
      <?php $zonas = $mysqlconn->query("SELECT * FROM salas;"); ?>
      <table class="table table-bordered">
        <thead>
          <th colspan="2" class="bg-light">
            <p class="h4 my-1 text-center">Lista de zonas</p>
          </th>
          <tr>
            <th>Nombre de zona</th>
            <th style="width: min-content;">Funciones</th>
          </tr>
        </thead>
        <tbody>
          <?php # Mostrando todas las zonas 
          ?>
          <?php while ($zona = $zonas->fetch_object()) { ?>
            <tr>
              <td><?= $zona->sala ?></td>
              <?php # Botón para borrar la zona según por su ID, enviandolo por GET al archivo mísmo 
                ?>
              <td><a href="<?= $_SERVER['PHP_SELF'] ?>?deleteID=<?= $zona->id ?>" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php } else include_once '../includes/templates/isntAdmin.html';
include_once '../includes/footer.php'; ?>