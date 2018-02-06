<?php

class Tests extends PHPUnit_Framework_TestCase {

	public function test() {

		echo $this -> checkCard()."\n";
		echo $this -> checkCardNumber()."\n";
		echo $this -> checkCVV1()."\n";
		echo $this -> checkCVV2()."\n";
		echo $this -> checkDateYear()."\n";
		echo $this -> checkDateMonth()."\n";
		echo $this -> checkDate()."\n";
		echo $this -> checkCode1()."\n";
		echo $this -> checkCode2()."\n";
		echo $this -> checkCode3()."\n";
	}

	function creditcard_check($ccn, $cvv, $ccyear, $ccmonth) {
		$check = "";
		$check = $check .$this->CCN_check($ccn);
		$check = $check .$this->CVV_check($cvv);
		$check = $check .$this->date_check($ccyear,$ccmonth);

		return $check;
	}

	function CCN_check($ccn){
		$check="";
		$pattern_1 = "(^[0-9]{16}$)";

		//Comprobacion de que el numero de la tarjeta cumpla el pattern

		if (preg_match($pattern_1, $ccn)) {
			$check = $check . "Correct card number. \n";
		} else if(!preg_match($pattern_1, $ccn)) {
			$check = $check . "Incorrect card number. \n";
		}
		return $check;
	}
	
	function CVV_check($cvv){
		$check="";
		if (strlen($cvv == "")) {
			$check = $check . "Empty CVV. \n";
		} else if (strlen($cvv) != 3) {
			$check = $check . "Incorrect CVV. \n";
		} else if (!preg_match("(^[0-9]{3}$)", $cvv)) {
				$check = $check . "The CVV must be 3 digits. \n";
		}else{
			$check = $check . "Correct CVV. \n";
		}
		return $check;
	}
	
	function date_check($ccyear,$ccmonth){
		$check="";
		if (!preg_match('(^[0-9]{4}$)', $ccyear)) {
			$check = $check . "Incorrect year. \n";
		}
		else if (!preg_match('(^(0[1-9]|1[0-2])$)', $ccmonth)) {
			$check = $check . "Incorrect month. \n";
		}

		// past date
		else if ($ccyear < date('Y') || $ccyear == date('Y') && $ccmonth < date('m')) {
			$check = $check . "The date can not be earlier than the current date. \n";
		}else{
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
		}else{
			$check = "Code incorrect.";
		}

		return $check;
	}

	function checkCard() {
		$bool = $this -> creditcard_check("1234567890123456", "123", "2019", "01");
		return $bool;
	}

	function checkCardNumber() {
		$bool = $this -> creditcard_check("123456789", "123", "2019", "01");
		return $bool;
	}

	function checkCVV1() {
		$bool = $this -> creditcard_check("1234567890123456", "", "2019", "01");
		return $bool;
	}

	function checkCVV2() {
		$bool = $this -> creditcard_check("1234567890123456", "1", "2019", "01");
		return $bool;
	}

	function checkDateYear() {
		$bool = $this -> creditcard_check("1234567890123456", "123", "201", "01");
		return $bool;
	}
	
	function checkDateMonth() {
		$bool = $this -> creditcard_check("1234567890123456", "123", "2017", "1");
		return $bool;
	}
	
	function checkDate() {
		$bool = $this -> creditcard_check("1234567890123456", "123", "2017", "01");
		return $bool;
	}
	
	function checkCode1() {
		$bool = $this -> code_promotional("ABCDEF123","1234567890123456", "123", "2017", "01");
		return $bool;
	}
	
	function checkCode2() {
		$bool = $this -> code_promotional("AB23","1234567890123456", "123", "2017", "01");
		return $bool;
	}
	
	function checkCode3() {
		$bool = $this -> code_promotional("ABCDEF123","", "", "", "");
		return $bool;
	}

}
?>