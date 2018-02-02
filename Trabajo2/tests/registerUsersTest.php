<?php
	 include_once("functions.php");

class RegisterUsersTest extends PHPUnit_Framework_TestCase
{
	
    public function test()
    { 
		$register = 'checkRegister';
		$this->$register();
		
		$emptyName = 'checkEmptyName';
		$this->$emptyName();
		
		$emptySurname = 'checkEmptySurname';
		$this->$emptySurname();
		
		$emptyEmail = 'checkEmptyEmail';
		$this->$emptyEmail();
		
		$email = 'checkEmail';
		$this->$email();
		
		$code = 'checkCode';
		$this->$code();

	}
	
	function checkRegister(){
		$bool = user_check("name", "surname", "", "email@email.com", "España", "");
		
		if($bool == TRUE){
			echo "Successfully registered.";
		}
	}
	
	function checkEmptyName(){
		$bool = user_check("", "surname", "", "email@email.com", "España", "");
		
		if($bool == FALSE){
			echo "There is not a name.";
		}
	}
	
	function checkEmptySurname(){
		$bool = user_check("name", "", "", "email@email.com", "España", "");
		
		if($bool == FALSE){
			echo "There is not a surname.";
		}
	}
	
	function checkEmptyEmail(){
		$bool = user_check("name", "surname", "", "", "España", "");
		
		if($bool == FALSE){
			echo "There is not an email.";
		}
	}
	
	function checkEmail(){
		$bool = user_check("name", "surname", "", "email", "España", "");
		
		if($bool == FALSE){
			echo "Incorrect email.";
		}
	}
	
	function checkCode(){
		$bool = user_check("name", "surname", "", "email@email.com", "España", "ABCDEF");
		
		if($bool == FALSE){
			echo "Incorrect code.";
		}
	}
}
?>