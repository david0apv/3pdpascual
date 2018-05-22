<?php
//Incluir archivo php de conexiòn
include 'conexion.php';

//Asignar funcion de conectar a una variable para conectar a la bd
$conn = conectar();

//Asignar query a variable (se agrego user_name y password para no romper la funcionalidad con los cambios en la bd)
$query = ("SELECT apaterno,amaterno,nombre,correo FROM usuarios ORDER BY apaterno ASC");
//Ejecutar query llamando la variable de conexiòn a la bd
$process = pg_query($conn, $query);
//Informar si la query se ejecuto o no
if  (!$process) {
	echo "No se pudo realizar la consulta";
} else {
	echo '<table border="1"><tr><th>Apellido</th><th>Nombre</th><th>Correo</th></tr>';
	while ($row = pg_fetch_row($process)) {
 	echo '<tr><td>'.$row[0].' '.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td></tr>';
	}
	echo '</table>';
}
//Cerrar la conexion a la bd
pg_close($conn);
?>