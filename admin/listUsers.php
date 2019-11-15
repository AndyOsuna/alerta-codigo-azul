<?php
include_once '../includes/header.php';

$users = $mysqlconn->query("SELECT * FROM usuarios");

if ($isAdmin) {
  ?>

  <div class="container pt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th colspan="3" class="text-center h4">Lista de usuarios</th>
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

<?php } else include 'templates/isntAdmin.html';
include_once '../includes/footer.php'; ?>