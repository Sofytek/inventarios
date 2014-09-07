<?php
	include_once('conexion.php');
	$mensajeOk = false;
	$mensajeError = 'No hay conexión';

	if(isset($_POST['usuario'], $_POST['contrasenia'])):
		if($_POST['usuario'] != ""):
			if ($_POST['contrasenia'] != ""):
				$usuario = $_POST['usuario'];
				$contrasenia = $_POST['contrasenia'];
				$consulta = pg_query($conexion, ("SELECT * FROM Usuario where usuario ='$usuario' contrasenia ='$contrasenia'"));
				if(pg_num_rows($consulta)>0):
					$mensajeOk = true;
					$datos = pg_fetch_array($consulta);
					session_start();
					$_SESSION['idUsuario'] = $datos[0];
					$_SESSION['usuario'] = $datos[1];
				else:
					$mensajeError = 'Usuario o Contraseña incorrecta';
				endif;
			else:
				$mensajeError = 'Contraseña incorrecta';
			endif;
		else:
			$mensajeError = 'Usuario no existe';
		endif;
	else:
		$mensajeError = 'Todos los campos son requeridos';

	$salidaJson = array('respuesta' => $mensajeOk, 'mensaje' => $mensajeError);
	echo json_encode($salidaJson);
?>