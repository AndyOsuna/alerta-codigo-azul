<?php
include_once '../../includes/header.php';

if($isAdmin){
/* Al entrar a eesta página, se envia a la vez el id del usuario a editar */
if(isset($_GET["editID"])) {
  $id = $_GET['editID'];
  if($id != "") {
    $user = $mysqlconn->query("SELECT * FROM usuarios WHERE id = $id");
  }
}
if(isset($_POST['username'])){
  $username = $_POST['username'];
  if($username != "") {
    $mysqlconn->query("UPDATE ");
  }
}
?>
<div class="container pt-5">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-header">
          <p class="h4 m-0">Edite un usuario</p>
        </div>
        <div class="card-body">
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Nombre de usuario">
            </div>
            <button type="submit" class="btn btn-success btn-block">Editar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>

<?php }
include_once '../../includes/footer.php';?>