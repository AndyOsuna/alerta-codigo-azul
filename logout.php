<?php
  require ('includes/configsql.php');
  
  if ($_SESSION['connected'] == false){
    header ('location: login.php');
  } else if ($_SESSION['connected'] == true) {
    $_SESSION['connected'] = false;
    header ('location: login.php');
  }
?>