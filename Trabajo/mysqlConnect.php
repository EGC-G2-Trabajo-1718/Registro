<?php
function abrir_conexion() {
	$host = 'host';
	$user = 'user';
	$password = 'password';
	$database = 'name_database';	
	
	try {
        global $con;
        // Abrir la conexion usando PDO.
        $con = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // Estable el modeo de errores usadndo  excepciones PDO
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die($e->getMessage());//Imprime el mensaje de error en pantalla
    }
}

function cerrar_conexion() {
	global $con;
    $con = null;
}

?>