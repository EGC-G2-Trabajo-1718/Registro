<?php

function user_register($name, $surname, $phone, $email, $country, $code, $database){
	$sql = "INSERT INTO " + $database + " USER VALUES ($name, $surname, $phone, $email, $country, $code)";
}

?>