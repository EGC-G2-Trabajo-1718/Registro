<!DOCTYPE HTML">
<html>
	<head>
		<script>
			function check(){
				alert("mal");
			}
		</script>
		<script type="text/javascript" src="js/checkDateCreditCard.js"></script>
		
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
      <form id="confirmationForm" action="successfulView.php" onsubmit="comprobarFecha()" method="post">
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
          	
			else{
          		?>
          		
          <label for="card" id="label_card">Tarjeta de Crédito</label>
		  <label for="asterisk" id="asterisk">(*)</label>		
          <input id="creditcard" pattern="(^$)|(^[0-9]{1}$)" required name="creditcard" type="number" value=""/>	
          
          <label for="card" id="label_card">Fecha de caducidad de la tarjeta de crédito</label>
		  <label for="asterisk" id="asterisk">(*)</label>		
          <input id="monthexpiration" pattern="(^$)|(^(0[1-9]|1[0-2])$)" size="4" required name="monthexpiration" 
          onClick="if(this.value=='mm')this.value=''" type="text" value="mm">
          <input id="yearexpiration" pattern="(^$)|(^[0-9]{4}$)" size="5" required name="yearexpiration" 
          onClick="if(this.value=='aaaa')this.value=''" type="text" value="aaaa">
          
          <label for="cvv" id="label_cvv">Introduzca CVV de la tarjeta de crédito</label>
		  <label for="asterisk" id="asterisk">(*)</label>		
          <input id="cvv" pattern="(^$)|(^[0-9]{1}$)" required name="cvv" type="text" value=""/>		
          
          <label for="asterisk" id="asterisk">(*)</label>
		  <label id="obligatory_field">Campo obligatorio</label>	
         
         <?php
        	}
			echo 'El precio total es ' . $price . "€<br/>";
        	

		?>
		
          <input type="submit" id="confirm" name="confirm" value="Confirmar">
          
          <input type="button" id="cancel" name="cancel" value="Cancelar" onclick="javascript:location.href='registerForm.php'">
          </fieldset>
      </form>
      
    </main>
    </body>

</html>
