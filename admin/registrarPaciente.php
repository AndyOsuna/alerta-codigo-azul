<?php include_once '../includes/header.php';
if ($isAdmin) {

/* Comprobamos si el formulario se envió */
  if (isset($_POST['nombre']) && isset($_POST['ubic']) && isset($_POST['nomenfermero'])) {
    $paciente = $_POST['nombre'];
    $ubic = $_POST['ubic'];
    $enfer = $_POST['nomenfermero'];
    if ($paciente != "" || $ubic != "" || $enfer != "") {
      /* Instertamos los datos del nuevo paciente en la DB */
      $mysqlconn->query("INSERT INTO pacientes (nombre, enfermero, ubicacion) VALUES ('$paciente', '$enfer', $ubic)") or $_SESSION['errorCreandoUser'] = "Error al intentar guardar en la base de datos";
      // if($_SESSION['errorCreandoUser'])
    } else {
      $_SESSION['errorCreandoUser'] = "Complete los campos";
    }
  }
  $enfermeros = $mysqlconn->query('SELECT `id`, `nombre`, `apellido` FROM `enfermeros`');
  $ubicacion = $mysqlconn->query('SELECT `id`, `sala` FROM `salas`');
  $pacientes = $mysqlconn->query('SELECT * FROM `pacientes`');
  $pacientec = $pacientes->fetch_object();
  $idp = $pacientec->id;
  
  $pacpac = $mysqlconn->query("SELECT * FROM `pacientes` WHERE id = $idp");
  $pacpac = $pacpac->fetch_object();
  
  $idu = $pacpac->ubicacion;
  $ide = $pacpac->enfermero;
  
  $ubicpac = $mysqlconn->query("SELECT * FROM `salas` WHERE id = $idu");
  $enfepac = $mysqlconn->query("SELECT * FROM `enfermeros` WHERE id = $ide");
  
  $idub = $ubicpac->fetch_object();
  $idef = $enfepac->fetch_object();
  ?>

  <div class="container pt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">

          <div class="card-header">
            <p class="h4 my-1 text-center">Registre un paciente</p>
          </div>

          <div class="card-body">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="form-group">
                <input type="text" placeholder="Nombre del paciente" name="nombre" class="form-control">
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Enfermero</div>
                  </div>
                <select placeholder="Enfermero" name="nomenfermero" class="form-control">
                  <?php
                  while ($rowsenf = $enfermeros -> fetch_assoc()){
                  echo'
                  <option value="'.$rowsenf['id'].'">'.$rowsenf['apellido'].' '.$rowsenf['nombre'].'</option>
                  ';
                  }
                  ?>
                </select>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Ubicación</div>
                  </div>
                <select placeholder="Ubicacion" name="ubic" class="form-control">
                  <?php
                  while ($rowsub = $ubicacion -> fetch_assoc()){
                  echo'
                  <option value="'.$rowsub['id'].'">'.$rowsub['sala'].'</option>
                  ';
                  }
                  ?>
                </select>
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-block">Guardar</button>
            </form>
          </div>

        </div> <!-- Cierra div 'card' -->
        
      </div>
      <div class="col-md-6">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th colspan="4" class="bg-light">
                <p class="h4 my-1 text-center">Lista de usuarios</p>
              </th>
            </tr>
            <tr>
              <th>Nombre de usuario</th>
              <th>Ubicación</th>
              <th>Enfermero</th>
              <th>Funciones</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($paciente = $pacientes->fetch_object()) { ?>
              <tr>
                <td><?= $paciente->nombre ?></td>
                <td><?= $idub->sala  ?></td>
                <td><?= $idef->apellido  ?> <?= $idef->nombre  ?></td>
                <td>
                <a href="functions/editPaciente.php?editID=<?= $paciente->id ?>" class="btn btn-warning">Editar</a>
                <a href="functions/editPaciente.php?editID=<?= $paciente->id ?>&delete=1" class="btn btn-danger">Borrar</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php } else include_once 'templates/isntAdmin.html';
include_once '../includes/footer.php'; ?>