<?php

class Tests extends PHPUnit_Framework_TestCase {

	public function test() {

		echo $this -> checkRegister();
		echo $this -> checkEmptyName();
		echo $this -> checkEmptySurname();
		echo $this -> checkEmptyEmail();
		echo $this -> checkEmail();
	}

	function user_check($name, $surname, $phone, $email, $country) {
		$check = "";
		if ($name == "") {
			$check = $check ."Empty name. \n";
		}

		if ($surname == "") {
			$check = $check ."Empty surname. \n";
		}
		if ($email == "") {
			$check = $check ."Empty email.";
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$check = $check ."Incorrect email. \n";
			}
		}
		return $check;

	}

	function checkRegister() {
		$bool = $this -> user_check("name", "surname", "", "email@email.com", "España");
		return $bool;
	}

	function checkEmptyName() {
		$bool = $this -> user_check("", "surname", "", "email@email.com", "España");
		return $bool;
	}

	function checkEmptySurname() {
		$bool = $this -> user_check("name", "", "", "email@email.com", "España");
		return $bool;
	}

	function checkEmptyEmail() {
		$bool = $this -> user_check("name", "surname", "", "", "España");
		return $bool;
	}

	function checkEmail() {
		$bool = $this -> user_check("name", "surname", "", "email", "España");
		return $bool;
	}

}
?>