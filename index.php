<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Registro</title>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--Cabecera-->
<div class="barra">
	<center><h4>Exámen 3</h4></center>
</div>

<div class="contenido">
	<?php
	//Abrir la sesion
	session_start();
	if ($_SESSION['error']) {
		echo "ERROR: ";
		switch ($_SESSION['error']) {
			case 1:
				echo "Nombre invalido";
				unset($_SESSION['error']);
				break;
			case 2:
				echo "Apellido paterno invalido";
				unset($_SESSION['error']);
				break;
			case 3:
				echo "Apellido materno invalido";
				unset($_SESSION['error']);
				break;
			case 4:
				echo "Teléfono invalido";
				unset($_SESSION['error']);
				break;
			case 5:
				echo "Correo invalido";
				unset($_SESSION['error']);
				break;
			case 6:
				echo "No se pudo realizar la peticion";
				unset($_SESSION['error']);
				break;
		}
	}
	if ($_SESSION['exito']) {
			echo "El registro fue exitoso";
			unset($_SESSION['exito']);
	}
	?>
<h2>Registro de usuarios</h2>
	<form action="alta_registro.php" method="post">
		<p>Introduzca su nombre y apellidos<br><br>
			Nombre: <input type="text" name="nombre" required><br><br>
			Apellido paterno: <input type="text" name="apaterno" required><br><br>
			Apellido materno: <input type="text" name="amaterno"><br><br>
		</p>
		<p>Introduzca su número telefónico<br><br>
			Telèfono: <input type="text" name="telefono" required><br><br>
		</p>
		<p>Introduzca su correo electrónico<br><br>
			Correo electronico: <input type="mail" name="mail" required><br><br>
		</p>
		<input type="submit" value="Enviar">
	</form>

<div class="fb-like" data-href="https://www.3pdpascual.unam.mx" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
</div>
<!--Enlaces-->
<div class="pie">
	<a href="inicio.php">Inicio</a>
	<a href="contacto.php">Contacto</a>
	<a href="consulta.php">Consulta de usuarios</a>
	<a href="creditos.php">Creditos</a>
</div>
</body>
</html>
