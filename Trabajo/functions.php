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

function creditcard_check($ccn, $cvv, $ccyear, $ccmonth  ){
	$check = TRUE;
	$pattern_1 ='/^((4[0-9]{12})|(4[0-9]{15})|(5[1-5][0-9]{14})|(3[47][0-9]{13})|(6011[0-9]{12}))$/';
    $pattern_2 = '/^((30[0-5][0-9]{11})|(3[68][0-9]{12})|(3[0-9]{15})|(2123[0-9]{12})|(1800[0-9]{12}))$/';
	$pattern_3
	
	//Comprobacion de que el numero de la tarjeta cumpla el pattern
	
	if(preg_match($pattern_1, $ccn)  ){
		$check =TRUE;
	}else if(preg_match($pattern_2, $ccn)){
		$check =TRUE;
	}else{
		$check = FALSE;
	}
	
	//Comprobacion de que el CVV sean tres digitos
	
	if(strlen($cvv) != 3 || $ccdate == "" ){
		$check = FALSE;
	}
	
	// Comprobacion de fechas
	
	$ccmonth = str_pad($ccmonth, 2, '0', STR_PAD_LEFT);
	
    if (! preg_match('/^20\d\d$/', $ccyear)) {
           $check = FALSE;
     }
    if (! preg_match('/^(0[1-9]|1[0-2])$/', $ccmonth)) {
            $check = FALSE;
     }
        // past date
    if ($ccyear < date('Y') || $ccyear == date('Y') && $ccmonth < date('m')) {
            $check = FALSE;
     }	
	
	
	return $check;
}

function code_promotional($code , $ccn, $cvv, $ccyear, $ccmonth ){
	$check = FALSE;
	
	if(preg_match('(^$)|(^[aA-zZ]{6}[0-9]{3}$)', $code){
			if($ccn == "" || $cvv == "" || $ccyear == "" || $ccmonth == ""){
				$check = TRUE;
			}
	}
	
	return $check;
}

?>