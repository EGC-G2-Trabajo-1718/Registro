<?php
    include_once plugin_dir_path(__FILE__).'/Widget_Registro.php';
	
	class ModuloRegistro{
		public function __construct(){
			add_action('widgets_init',function(){
				register_widget('Widget_Registro');
			});
		}
				 
	} 
?>