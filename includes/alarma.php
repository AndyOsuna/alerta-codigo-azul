<?php
$resultados = mysqli_query($mysqlconn, "SELECT * FROM llamados WHERE `atendido` = 0");
if (mysqli_num_rows($resultados) == 0) {
  // No hay llamados en el momento.
} else {
  echo '
  <script> alert("CÓDIGO AZUL\nHay llamados pendientes por responder."); </script>
  ';
}
?>