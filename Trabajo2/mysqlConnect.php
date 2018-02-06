<?php
function abrir_conexion() {
	$host = 'host';
	$user = 'egcRegistro';
	$password = 'password';
	$database = 'registro';	
	
	global $con;
    $con = mysql_connect($host, $user, $password);
	mysql_select_db($database, $con);
      
}

function cerrar_conexion() {
	mysql_close($con);
}

?>