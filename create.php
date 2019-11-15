<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

date_default_timezone_set('America/Buenos_Aires');

// Define variables vacias
$ubicacion = $paciente = $tipo = "";
$ubicacion_err = $paciente_err = $tipo_err = "";

// Obtener lista de salas. 
$lista_salas = '';
$query1 = $mysqlconn->query("SELECT sala FROM salas");
while ($row1 = $query1->fetch_array()) {
	$lista_salas .= "<option>" . $row1['sala'] . "</option>";
}

$menu_salas = "
  <p><label>Ubicacion</label></p>
    <select id='ubicacion' name='ubicacion' class='form-control' value='<?php echo $ubicacion; ?>'>
      " . $lista_salas . "
    </select>
";

// Obtener lista de pacientes. 
$lista_pacientes = '';
$query2 = $mysqlconn->query("SELECT nombre FROM pacientes");
while ($row2 = $query2->fetch_array()) {
	$lista_pacientes .= "<option>" . $row2['nombre'] . "</option>";
}

$menu_pacientes = "
  <p><label>Paciente</label></p>
    <select id='paciente' name='paciente' class='form-control' value='<?php echo $paciente; ?>'>
      " . $lista_pacientes . "
    </select>
";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Ubicación específica
	$input_ubicacion = trim($_POST["ubicacion"]);
	if (empty($input_ubicacion)) {
		$ubicacion_err = "Coloca una ubicación.";
	} else {
		$ubicacion = $input_ubicacion;
	}

	//Paciente
	$input_paciente = trim($_POST["paciente"]);
	if (empty($input_paciente)) {
		$paciente_err = "Coloca un paciente.";
	} else {
		$paciente = $input_paciente;
	}

	//Tipo de llamado
	$input_llamado = trim($_POST["tipo"]);
	if (empty($input_llamado)) {
		$tipo_err = "Coloque tipo de llamado.";
	} else {
		$tipo = $input_llamado;
	}

	if (empty($ubicacion_err) && empty($paciente_err) && empty($tipo_err)) {
		$sql = "INSERT INTO llamados (ubicacion, paciente, tipo, fecha_hora) VALUES (?, ?, ?, ?)";

		if ($stmt = $mysqlconn->prepare($sql)) {
			mysqli_stmt_bind_param($stmt, "ssss", $param_ubicacion, $param_paciente, $param_tipo, $param_hora);

			$param_ubicacion = $ubicacion;
			$param_paciente = $paciente;
			$param_tipo = $tipo;
			$param_hora = date("Y-m-d H:i:s");

			if (mysqli_stmt_execute($stmt)) {
				header("location: /");
				exit();
			} else {
				echo "Error.";
			}
		}

		mysqli_stmt_close($stmt);
	}
}
?>

<div class="wrapper">
	<div class="container pt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h2>Realizar llamado</h2>
				</div>
				<p>Por favor rellene toda la información posible antes de realizar un llamado.</p>
				<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" id="form-llamado">
					<!--- Ubicacion --->
					<div class="form-group <?php echo (!empty($ubicacion_err)) ? 'has-error' : ''; ?>">
						<?php echo $menu_salas; ?>
						<span class="help-block"><?php echo $ubicacion_err; ?></span>
					</div>
					<!--- Paciente --->
					<div class="form-group <?php echo (!empty($paciente_err)) ? 'has-error' : ''; ?>">
						<?php echo $menu_pacientes; ?>
						<span class="help-block"><?php echo $paciente_err; ?></span>
					</div>
					<!--- Tipo --->
					<div class="form-group <?php echo (!empty($tipo_err)) ? 'has-error' : ''; ?>">
						<label>Tipo</label>
						<br>
						<select id="tipo" name="tipo" class="form-control" value="<?php echo $tipo; ?>">
							<option value="Emergencia">Emergencia</option>
							<option value="Llamado">Llamado</option>
						</select>
						<span class="help-block"><?php echo $tipo_err; ?></span>
						<!--- <input type="text" name="tipo" class="form-control" value="<?php echo $tipo; ?>">
                             --->
					</div>
					<input type="submit" class="btn btn-primary" value="Enviar">
					<a href="/" class="btn btn-default">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include_once 'includes/footer.php';  ?>