<?php
include_once '../../includes/header.php';

if($isAdmin){
/* Al entrar a eesta página, se envia a la vez el id del usuario a editar */
if(isset($_GET["editID"])) {
  $id = $_GET['editID'];
  if (isset($_GET["delete"])){
    if ($_GET["delete"] == 1){
      $pacientes = $mysqlconn->query("DELETE FROM pacientes WHERE id = $id");
      die ('Eliminado');
    }
  }
  if($id != "") {
    $pacientes = $mysqlconn->query("SELECT * FROM pacientes WHERE id = $id");
    $paciente = $pacientes ->fetch_assoc();
  }
}

  if (isset($_POST['nombrepaciente']) && isset($_POST['ubic']) && isset($_POST['nomenfermero'])) {
    $paciente = $_POST['nombrepaciente'];
    $ubic = $_POST['ubic'];
    $enfer = $_POST['nomenfermero'];
    if ($paciente != "" || $ubic != "" || $enfer != "") {
      /* Instertamos los datos del nuevo paciente en la DB */
      $mysqlconn->query("UPDATE pacientes SET `nombre` = '$paciente', `enfermero` = '$enfer', `ubicacion` = '$ubic' WHERE id = $id") or $_SESSION['errorCreandoUser'] = "Error al intentar guardar en la base de datos";
      // if($_SESSION['errorCreandoUser'])
    } else {
      $_SESSION['errorCreandoUser'] = "Complete los campos";
    }
  }
if(isset($_POST['nombre'])){
  $paciente = $_POST['nombre'];
  if($paciente != "") {
    $mysqlconn->query("UPDATE ");
  }
  
}

  $enfermeros = $mysqlconn->query('SELECT `id`, `nombre`, `apellido` FROM `enfermeros`');
  $ubicacion = $mysqlconn->query('SELECT `id`, `sala` FROM `salas`');
?>
<div class="container pt-5">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-header">
          <p class="h4 m-0">Editar paciente</p>
        </div>
        <div class="card-body">
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
              <input type="text" name="nombrepaciente" class="form-control" placeholder="<?= $paciente['nombre']?>" required>
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
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
            <button type="submit" class="btn btn-success btn-block">Editar paciente</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>

<?php }
include_once '../../includes/footer.php';?>