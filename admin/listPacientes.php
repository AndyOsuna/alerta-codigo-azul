<?php include_once '../includes/header.php';
if ($isAdmin) {
  ?>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th colspan="2" class="h4 my-1 text-center">Lista de <strong>Pacientes</strong></th>
            </tr>
            <tr>
              <th>N°</th>
              <th>Nombre</th>
            </tr>
          </thead>
          <tbody>
            <?php $pacientes = $mysqlconn->query("SELECT * FROM pacientes");
              while ($p = $pacientes->fetch_object()) { ?>
              <tr>
                <td><?= $p->id ?></td>
                <td><?= $p->nombre ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php }
include_once '../includes/footer.php'; ?>