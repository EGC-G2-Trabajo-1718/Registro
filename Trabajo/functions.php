<?php

function user_check($name, $surname, $phone, $email, $country, $code){
	$check = TRUE;
	if($name == "" || $surname == "" || $email == ""){
		$check = FALSE;
	}
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$check = FALSE;
	}
	
	if($code != ""){
		if(!preg_match("(^$)|(^[aA-zZ]{6}[0-9]{3}$)", $code)){
			$check = FALSE;
		}
	}
	
	return $check;
	
}

function user_register($name, $surname, $phone, $email, $country, $code){
	if(user_check($name, $surname, $phone, $email, $country, $code)){
		$sql = "INSERT INTO USER(name, surname, phone, email, country, code) VALUES ($name, $surname, $phone, $email, $country, $code)";
		mysql_query($sql);
	}
	
}

?>