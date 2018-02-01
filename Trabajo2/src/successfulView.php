<?php

	function confirmed(){	

		echo '	<html>
					<head>
						<title>Registrado correctamente</title>
					</head>
						
					<body>
						<h2>Se ha registrado correctamente</h2>
						<p>El proceso de registro ha tenido éxito y pudo registrarse correctamente.</p>
						
						<input type="button" id="return" name="return" value="Volver" onclick="javascript:location.href="registerForm.php"">
					</body>
				</html>
		';
	}
?>