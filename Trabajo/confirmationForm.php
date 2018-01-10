<!DOCTYPE HTML">
<html>
	<head>
		<title>Confirmation form</title>
		<meta charset="UTF-8" />
	</head>
	
	<body>
		<header>
			<div class="cabecera">
				<h1 id="title">Confirmación de pago</h1>
			</div>
		</header>

	<main>
      <form id="confirmationForm" action="" method="post">
      	<fieldset>
      	<h2 id="thanks">Gracias por completar el formulario</h2>
      	<p id="info">Añada su tarjeta de crédito y haga click en Confirmar para finalizar su registro, o bien
      		en Cancelar para volver al formulario de registro</p>

      	<?php
        	$price = 890;

        	if (isset($_GET['code'])){
          		echo 'Código promocional aplicado.<br/>';
          		$price = 0;
        	}

        	echo 'El precio total es ' . $price . "€<br/>";

		?>
		
          <input type="submit" id="confirm" name="confirm" value="Confirmar" onclick="">
          
          <input type="button" id="cancel" name="cancel" value="Cancelar" onclick="javascript:location.href='registerForm.php'">
          </fieldset>
      </form>
      
    </main>
    </body>

</html>
