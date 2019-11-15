<?php include_once '../includes/header.php';

if ($isAdmin) {
  /* Comprobamos si el formulario se envió */
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $isAdmin = $_POST['isAdmin'];
    if ($username != "" || $pass != "" || $isAdmin != "") {
      /* Instertamos los datos del nuevo usuario en la DB */
      $mysqlconn->query("INSERT INTO usuarios (usuario, password, isAdmin) VALUES ('$username', '$pass', $isAdmin)") or $_SESSION['errorCreandoUser'] = "Error al intentar guardar en la base de datos";
      // if($_SESSION['errorCreandoUser'])
    } else {
      $_SESSION['errorCreandoUser'] = "Complete los campos";
    }
  }
  $users = $mysqlconn->query("SELECT * FROM usuarios");


  ?>

  <div class="container pt-5">
    <div class="row">
      <div class="col-md-6 mx-auto mb-4">
        <?php if (isset($_SESSION['errorCreandoUser'])) { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong><?= $_SESSION['errorCreandoUser'] ?></strong>
          </div>
        <?php unset($_SESSION['errorCreandoUser']);
          } ?>

        <div class="card">

          <div class="card-header">
            <p class="h4 my-1 text-center">Crea un usuario</p>
          </div>

          <div class="card-body">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" required autofocus>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Rol</div>
                  </div>
                  <select name="isAdmin" class="form-control" required>
                    <option value="0">Usuario genérico</option>
                    <option value="1">Administrador</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-block">Crear usuario</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th colspan="3" class="bg-light">
                <p class="h4 my-1 text-center">Lista de usuarios</p>
              </th>
            </tr>
            <tr>
              <th>Nombre de usuario</th>
              <th>Es admin</th>
              <th>Funciones</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($user = $users->fetch_object()) { ?>
              <tr>
                <td><?= $user->usuario ?></td>
                <?php if ($user->isAdmin) { ?>
                  <td>Administrador</td>
                <?php } else { ?>
                  <td>Usuario genérico</td>
                <?php } ?>
                <td><a href="functions/editUser.php?editID=<?= $user->id ?>" class="btn btn-warning">Editar</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php } else include_once '../includes/templates/isntAdmin.html';
include_once '../includes/footer.php' ?>