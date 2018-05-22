<!DOCTYPE HTML>
<html>
<head>
<title>Alta Registro</title>
</head>
<body>
<?php
//Incluir archivo php de conexiòn
include 'conexion.php';

//Asignar funcion de conectar a una variable para conectar a la bd
$conn = conectar();

//Abrir la sesion
session_start();

//Sanitizar los formularios (quitar caracteres especiales o no pertenecientes al tipo de campo)
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
$telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
$correo = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);

//Validar formularios
if ($nombre) {
	if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
		$_SESSION['error'] = 1;
	}
}
if ($apaterno) {
	if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
		$_SESSION['error'] = 2;
	}
}
if ($amaterno) {
	if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
		$_SESSION['error'] = 3;
	}
}
if ($telefono) {
	if (!preg_match('/[0-9]{8,12}/',$telefono)) {
		$_SESSION['error'] = 4;
	}
}
if ($correo) {
	if (!preg_match('/^[a-zA-Z][a-zA-Z0-9_\-]?(\.?[a-zA-Z0-9_\-])+@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/',$correo)) {
		$_SESSION['error'] = 5;
	}
}

//Insertar datos a db si no hubo errores en caso contrario indicar el error
if (!$_SESSION['error']) {
	//Asignar query a variable (se agrego user_name y password para no romper la funcionalidad con los cambios en la bd)
	$query = ("INSERT INTO usuarios (nombre,apaterno,amaterno,telefono,correo,user_name,password) VALUES ('$nombre','$apaterno','$amaterno','$telefono','$correo','$nombre','$password')");
	//Ejecutar query llamando la variable de conexiòn a la bd
	$process = pg_query($conn, $query);
	//Informar si la query se ejecuto o no
	if  (!$process) {
	   	$_SESSION['error'] = 6;
	   	header("Location: index.php");
		exit;
	}
	else {
		$_SESSION['exito'] = 1;
		header("Location: index.php");
		exit;
	}
} else{
	header("Location: index.php");
	exit;
}

//Cerrar la conexion a la bd
pg_close($conn);
?>
</body>
</html>
