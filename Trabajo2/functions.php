<?php

	function user_check($name, $surname, $phone, $email, $country){
	$check = TRUE;
	if($name == "" || $surname == "" || $email == ""){
		$check = FALSE;
	}
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$check = FALSE;
	}
	
	return $check;
	
}

function user_register($name, $surname, $phone, $email, $country, $code){
	if(user_check($name, $surname, $phone, $email, $country, $code)){
		$id = generate_id();
		$rdate = get_current_date();
		$sql = "INSERT INTO USER(id, name, surname, phone, email, country, registrationDate) VALUES (" . $id . ", " . $name . ", " . $surname . ", " . $phone . ", " . $email . ", " . $country . ", " . $rdate . ")";
		mysql_query($sql);
	}
	
}

function generate_id(){
	$result = mysql_query('SELECT count(id) FROM USER');
	$id = $result + 1;
	return $id;
}

function get_current_date(){
	$date = getdate();
	$day = $date['mday'];
	$month = $date['mon'];
	$year = $date['year'];
	$hours = $date['hours'];
	$minutes = $date['minutes'];
	$sdate = $day . "/" . $month . "/" . $year . " " . $hours . ":" . $minutes;
	return $sdate;
}

function creditcard_check($ccn, $cvv, $ccyear, $ccmonth  ){
	$check = TRUE;
	$pattern_1 = "^[0-9]{16}$";
	
	//Comprobacion de que el numero de la tarjeta cumpla el pattern
	
	if(preg_match($pattern_1, $ccn)  ){
		$check =TRUE;
	}else{
		$check = FALSE;
	}
	
	//Comprobacion de que el CVV sean tres digitos
	
	if(strlen($cvv) != 3 || $ccdate == ""){
		$check = FALSE;
	}
	else{
		if(!preg_match("^[0-9]{3}$", $cvv)){
			$check = FALSE;
		}
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
	
	if(preg_match('(^$)|(^[aA-zZ]{6}[0-9]{3}$)', $code)){
			if($ccn == "" || $cvv == "" || $ccyear == "" || $ccmonth == ""){
				$check = TRUE;
			}
	}
	
	return $check;
}

?>