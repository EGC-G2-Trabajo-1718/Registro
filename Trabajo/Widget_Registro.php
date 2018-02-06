<?php
    
    class WidgetRegistro extends WP_Widget{
    	
		public function __construct(){
			parent::__construct('nombre_widget','WidgetRegistro');	
		}
		
		public function widget($args,$instance){
			echo 'hola';
		}
    }
?>