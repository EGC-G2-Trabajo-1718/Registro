<?php
function abrir_conexion() {
	$host = 'host';
	$user = 'user';
	$password = 'password';
	$database = 'name_database';	
	
	global $con;
    $con = mysql_connect($host, $user, $password);
	mysql_select_db($database, $con);
      
}

function cerrar_conexion() {
	mysql_close($con);
}

?>