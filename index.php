<?php 
$loginvar = false;
include_once 'includes/header.php';
include_once 'includes/alarma.php';
?>

<div class="jumbotron">
  <h1 class="my-5">¡Bienvenido!</h1>
  <?php if ($isAdmin == true) { ?>
    <a class="btn btn-info" href="/create.php"><h1>Enviar Alerta</h1></a> 
    <a class="btn btn-info" href="/llamados.php"><h1>Ver alertas</h1></a>
    <?php } ?>
</div>

<?php include_once 'includes/footer.php'; ?>