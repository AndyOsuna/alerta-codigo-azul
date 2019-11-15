<?php
include('includes/configsql.php');

if ($_SESSION['connected'] == false) {
  if (isset($loginvar)) {
    if ($loginvar == false) {
      header('location: login.php');
    }
  } else if (!isset($loginvar)) {
    header('location: ' . $_SERVER['DOCUMENT_ROOT'] . '/login.php');
  }
}

/* Se comprueba si el usuario se logeó. Al logearse se crea una variable de sesión llamada 'userIdLogeado',
donde se guarda el 'id' del usuario */
if (isset($_SESSION['userIdLogeado'])) {
  if ($_SESSION['userIdLogeado'] != '') {
    $id = $_SESSION['userIdLogeado'];

    if ($id != '') {
      /* Consulta a la tabla 'usuarios' */
      $user = $mysqlconn->query("SELECT * FROM usuarios WHERE id = $id");
      $user = $user->fetch_object();
      /* Revisamos si el usuario es administrador, y en la variable $isAdmin que registrado si lo es o no. */
      $user->isAdmin ? $isAdmin = true : $isAdmin = false;
    } else {
      $id = false;
    }
  }
} else if (!isset($_SESSION['userIdLogeado'])) {
  $_SESSION['userIdLogeado'] = '';
}
require_once 'includes/htmlpurifier/HTMLPurifier.includes.php';
require_once 'includes/htmlpurifier/HTMLPurifier.auto.php';

$configpurifuer = HTMLPurifier_Config::createDefault();
$configpurifuer->set('Core.Encoding', 'ISO-8859-1');
$purifier = new HTMLPurifier($configpurifuer);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hospital Blue Code</title>
  <link rel="stylesheet" href="css/bootswatch-cosmo.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="padding-top: 55px;">

  <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="index.php">Blue Code</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    if ($_SESSION['connected'] == true) { ?>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <?php if ($isAdmin == true) { ?>
            <li class="nav-item">
              <a href="/admin/" class="nav-link">Panel Administrador</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a href="/usuario/" class="nav-link">Panel Usuario</a>
          </li>
          <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Panel Usuario</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="nav-link" href="">7u7</a>
              <a class="nav-link" href="/usuario">Usuario</a>
          </div>
        </li> -->
        </ul>
      <?php } ?>
      <!-- <ul class="navbar-nav pull-right">
        <li class="nav-item"> -->
      <?php
      if ($_SESSION["connected"] == true) { ?>
        <a class="btn btn-outline-dark" href="<?PHP $_SERVER['DOCUMENT_ROOT'] ?>/logout.php">Cerrar sesión</a>
      <?php } ?>
      <!-- </li>
      </ul> -->

      </div>
  </nav>