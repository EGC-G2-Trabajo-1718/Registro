<?php
	 include("functions.php");

class Tests extends PHPUnit_Framework_TestCase
{
	
    public function test()
    { 
		$boo = $this->checkRegister();
		$this->assertEquals(TRUE,$boo);

	}
	
	
	function checkRegister(){
		$bool = user_check("name", "surname", "", "email@email.com", "España");
		
		if($bool == TRUE){
			echo "Successfully registered.";
		}
		return $bool;
	}
	
	function checkEmptyName(){
		$bool = user_check("", "surname", "", "email@email.com", "España");
		
		if($bool == FALSE){
			echo "There is not a name.";
		}
	}
	
	function checkEmptySurname(){
		$bool = user_check("name", "", "", "email@email.com", "España");
		
		if($bool == FALSE){
			echo "There is not a surname.";
		}
	}
	
	function checkEmptyEmail(){
		$bool = user_check("name", "surname", "", "", "España");
		
		if($bool == FALSE){
			echo "There is not an email.";
		}
	}
	
	function checkEmail(){
		$bool = user_check("name", "surname", "", "email", "España");
		
		if($bool == FALSE){
			echo "Incorrect email.";
		}
	}
}
?>