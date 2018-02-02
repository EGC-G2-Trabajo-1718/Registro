<?php
	 include('functions.php');

class Tests extends PHPUnit_Framework_TestCase
{
	
    public function test()
    {
    	#$this->checkRegister(); 
		$boo = $this->checkRegister();
		$this->assertEquals(TRUE,$boo);
		#$this->checkEmptyName(); 
		#$this->checkEmptySurname(); 
		#$this->checkEmptyEmail(); 
		#$this->checkEmail(); 

	}
	
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
	
	function checkRegister(){
		$bool = $this->user_check("name", "surname", "", "email@email.com", "España");
		
		if($bool == TRUE){
			echo "Successfully registered.";
		}
		return $bool;
	}
	
	function checkEmptyName(){
		$bool = $this->user_check("", "surname", "", "email@email.com", "España");
		
		if($bool == FALSE){
			echo "There is not a name.";
		}
	}
	
	function checkEmptySurname(){
		$bool = $this->user_check("name", "", "", "email@email.com", "España");
		
		if($bool == FALSE){
			echo "There is not a surname.";
		}
	}
	
	function checkEmptyEmail(){
		$bool = $this->user_check("name", "surname", "", "", "España");
		
		if($bool == FALSE){
			echo "There is not an email.";
		}
	}
	
	function checkEmail(){
		$bool = $this->user_check("name", "surname", "", "email", "España");
		
		if($bool == FALSE){
			echo "Incorrect email.";
		}
	}
}
?>