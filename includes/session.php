<?php
  session_start();
  if ($_SESSION['connected'] == true){
    
  } else if (!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = false;
  }
