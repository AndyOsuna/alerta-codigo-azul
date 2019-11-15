<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

if($isAdmin) {
?>

<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header clearfix">
					<h2 class="pull-left">Llamados</h2>
					<a href="create.php" class="btn btn-success pull-right">Enviar nuevo llamado</a>
				</div>
				<?php
				// Archivo de configuración
				require_once "config.php";

				// Intentar un query para obtener los llamados.
				$sql = "SELECT * FROM llamados WHERE atendido = 0";
				if ($result = mysqli_query($link, $sql)) {
					if (mysqli_num_rows($result) > 0) {
						echo "<table class='table table-bordered table-striped'>";
						echo "<thead>";
						echo "<tr>";
						echo "<th>Ubicacion</th>";
						echo "<th>Paciente</th>";
						echo "<th>Tipo</th>";
						echo "<th>Atendido</th>";
						echo "</tr>";
						echo "</thead>";
						echo "<tbody>";
						while ($row = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td>" . $row['ubicacion'] . "</td>";
							echo "<td>" . $row['paciente'] . "</td>";
							echo "<td>" . $row['tipo'] . "</td>";
							echo "<td>";
							echo "<a href='atender.php?id=" . $row['id'] . "' title='Marcar como atendido' data-toggle='tooltip'>Marcar como atendido</a>";
							echo "</td>";
							echo "</tr>";
						}
						echo "</tbody>";
						echo "</table>";
						// Liberar el set de resultados.
						mysqli_free_result($result);
					} else {
						echo "<p class='lead'><em>No hay llamados en el momento.</em></p>";
					}
				} else {
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				}

				// Cerrar conexión.
				mysqli_close($link);
				?>
			</div>
		</div>
	</div>
</div>
			<?php } else include_once 'includes/templates/isntAdmin.html';
			include_once 'includes/footer.php';
			?>