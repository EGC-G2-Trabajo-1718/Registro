<?php
function abrir_conexion() {
	$host = 'host';
	$user = 'user';
	$password = 'password';
	$database = 'name_database';	
	
	global $con;
    $con = mysqli_connect($host, $user, $password);
	mysqli_select_db($database, $con);
      
}

function cerrar_conexion() {
	mysqli_close();
}

?>