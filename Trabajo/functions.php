<?php

function database_user_table() {
 
  global $wpdb;
  $nombreTabla = "USER";
  
  $created = dbDelta(  
    "CREATE TABLE $nombreTabla (
      ID bigint(10) unsigned NOT NULL AUTO_INCREMENT,
      name varchar(20) NOT NULL DEFAULT '',
      surname varchar(20) NOT NULL DEFAULT '',
      phone varchar(10) NOT NULL DEFAULT '',
      email varchar(30) NOT NULL DEFAULT '',
      country varchar(20) NOT NULL DEFAULT '',
      registrationDate varchar(20) NOT NULL DEFAULT '',
      PRIMARY KEY (ID),
      KEY email (email)
    ) CHARACTER SET utf8 COLLATE utf8_general_ci;"
  );
} 
register_activation_hook( __FILE__, 'database_user_table' );

function user_check($name, $surname, $phone, $email, $country) {
	$check = "";
	if ($name == "") {
		$check = $check . "Empty name. \n";
	}

	if ($surname == "") {
		$check = $check . "Empty surname. \n";
	}
	if ($email == "") {
		$check = $check . "Empty email.";
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$check = $check . "Incorrect email. \n";
		}
	}
	return $check;

}

function user_register($name, $surname, $phone, $email, $country){
	if(user_check($name, $surname, $phone, $email, $country)){
		$rdate = get_current_date();
		global $wpdb;
		$wpdb->insert( 'USER',
				array(
				     'name' => $name,
				     'surname' => $surname,
				     'phone' => $phone,
				     'email' => $email,
				     'country' => $country,
				     'registrationDate' => $rdate));

	}
	
}

function get_current_date() {
	$date = getdate();
	$day = $date['mday'];
	$month = $date['mon'];
	$year = $date['year'];
	$hours = $date['hours'];
	$minutes = $date['minutes'];
	$sdate = $day . "/" . $month . "/" . $year . " " . $hours . ":" . $minutes;
	return $sdate;
}

function creditcard_check($ccn, $cvv, $ccyear, $ccmonth) {
	$check = "";
	$check = $check . $this -> CCN_check($ccn);
	$check = $check . $this -> CVV_check($cvv);
	$check = $check . $this -> date_check($ccyear, $ccmonth);

	return $check;
}

function CCN_check($ccn) {
	$check = "";
	$pattern_1 = "(^[0-9]{16}$)";

	//Comprobacion de que el numero de la tarjeta cumpla el pattern

	if (preg_match($pattern_1, $ccn)) {
		$check = $check . "Correct card number. \n";
	} else if (!preg_match($pattern_1, $ccn)) {
		$check = $check . "Incorrect card number. \n";
	}
	return $check;
}

function CVV_check($cvv) {
	$check = "";
	if (strlen($cvv == "")) {
		$check = $check . "Empty CVV. \n";
	} else if (strlen($cvv) != 3) {
		$check = $check . "Incorrect CVV. \n";
	} else if (!preg_match("(^[0-9]{3}$)", $cvv)) {
		$check = $check . "The CVV must be 3 digits. \n";
	} else {
		$check = $check . "Correct CVV. \n";
	}
	return $check;
}

function date_check($ccyear, $ccmonth) {
	$check = "";
	if (!preg_match('(^[0-9]{4}$)', $ccyear)) {
		$check = $check . "Incorrect year. \n";
	} else if (!preg_match('(^(0[1-9]|1[0-2])$)', $ccmonth)) {
		$check = $check . "Incorrect month. \n";
	}

	// past date
	else if ($ccyear < date('Y') || $ccyear == date('Y') && $ccmonth < date('m')) {
		$check = $check . "The date can not be earlier than the current date. \n";
	} else {
		$check = $check . "Correct date. \n";
	}
	return $check;
}

function code_promotional($code, $ccn, $cvv, $ccyear, $ccmonth) {
	$check = "All is correct.";

	if (preg_match('(^[aA-zZ]{6}[0-9]{3}$)', $code)) {
		if ($ccn != "" || $cvv != "" || $ccyear != "" || $ccmonth != "") {
			$check = "Error. When the code is correct, there should be no more parameters.";
		}
	} else {
		$check = "Code incorrect.";
	}

	return $check;
}
?>