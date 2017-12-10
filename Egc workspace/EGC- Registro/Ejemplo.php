<!DOCTYPE HTML">
<html>
	<head>
		<title>Registro</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0>"
	</head>
	
	<!--- Cuerpo del menu principal--->
	<body >
		<?php include_once ("cabecera.php");?>
		
		<main>
		<form id="formcheck" action="" method="post"  onsubmit="">
			
				<div>
					<label for="name" id="label_name">Name:</label>
					<input id="name" type="text" name="name"   value="" />
				</div>
				
				<div>
					<label for="surname" id="label_surname">Surname:</label>
					<input id="surname" type="text"  name="surname"    value=""/>
				</div>
				<div>
					<label for="phone" id="label_phone">Surname:</label>
					<input id="phone" type="tel"  name="phone"    value=""/>
				</div>
				
				<div>
					<label for="email" id="label_email">Email:</label>
					<input id="email" type="email" name="email"   value="" />
				</div>
				
				<div>
					<label for="dni" id="label_dni">DNI:</label>
					<input id="dni" type="text" name="dni"   placeholder="DNI/NIF" pattern="^[0-9]{8}[A-Z]" value=""/>
				</div>
				
				
				<div>
					<label for="pais" id="label_pais">Pais:</label>
					<input id="pais" placeholder="pais" name="pais"  type="text" value="<?php echo $formulario['pais']; ?>"/>		
				</div>
		
				<div>
					<input id="prueba" type="submit" value="Crear" />
					<input type="reset" value="Reset"/>	
				</div>
				
			</form>
		</main>	
		
		<?php
				include_once("pie.php");
		?>	
	</body>
</html>