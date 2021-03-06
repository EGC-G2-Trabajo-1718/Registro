<?php
/*
Plugin Name: Votes Registration
Plugin URI:  https://www.splc2017.net
Description: Este plugin es para el registro de votaciones
Version:     1.0.0
Author:      Grupo EGC- Registro
Author URI:  

Text Domain: wporg
Domain Path: /languages
*/
include_once("functions.php");


//Vistas con Formularios
include_once("registerForm.php");
include_once("confirmationForm.php");
include_once("successfulView.php");

register_desactivate_hook(__FILE__, 'splcregistration_install' );
register_activation_hook( __FILE__, 'splcregistration_install' );

add_shortcode( 'cr_splcregistration', 'splc_registration_shortcode' );



function splc_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}

function custom_registration_function() {
    
    global $studentToken;
    $student = false;
    if ($_GET["student"]==$studentToken){
        $student = true;
    }
    $registration_info  = array();
    $idRegistration     = 0;
    $status             = "registrationform";
    
    
    if ( isset($_POST['submit'] ) ) {
        // sanitize user form input
        $name     	    =   sanitize_text_field( $_POST['name'] );
        $surname        =   sanitize_text_field( $_POST['surname'] );        
        $phone          =   sanitize_text_field( $_POST['phone'] );
        $email          =   sanitize_email( $_POST['email'] );	
		$country 		=	sanitize_email( $_POST['country'] );
		$status         =   "confirmationform";
		
		//Verificacion mediante php de los datos introducidos que no esten vacios y que el campo email sea correcto
		$check = user_check($name, $surname, $phone, $email, $country);
		
		if( $check != ""){
			echo "Error en los datos introducidos";
			echo $check;
			$status = "error";
		}
		
        $registration_info = array(
                'name' => $name,
                'surname' => $surname,              
                'phone' => $phone,
                'email' => $email
        );
		
    }else if (isset($_POST["confirm"])){
			$status = "confirmed";
		
        	$idRegistration = complete_registration($_POST);
				
    }
        
    
    generate_view($registration_info, $status, $idRegistration, $student);
}


function generate_view($registration_info, $status, $idRegistration, $student) {
    if ($status == 'registrationform'){
        registration_form($registration_info, $student, $params);
    }else if ($status == 'confirmationform'){
        confirmation_form($registration_info);    
    }else if ($status == 'confirmed'){
        confirmed();
    }else{
		echo "There was an error. Please try again or contact admin";
	}
}

?>
