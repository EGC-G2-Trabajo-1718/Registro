<?php 
// Definimos la clase
class User{
     
    // Atributos
    public $name;
	public $surname;
    public $phone;
    public $email;
	public $country;
     
    // Constructor
    public function __construct($name, $surname, $phone,$email,$country){
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
		$this->email = $email;
		$this->country = $country;
    }
	
	public function getName(){
        return $this->name;
    }
	public function getSurname(){
        return $this->surname;
    }
	public function getPhone(){
        return $this->phone;
    }
	public function getEmail(){
        return $this->email;
    }
	public function getCountry(){
        return $this->country;
    }
}
	
?>