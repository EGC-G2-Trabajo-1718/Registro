<!DOCTYPE HTML">
<html>
	<head>
		<title>Confirmation</title>
		<meta charset="UTF-8" />
	</head>

  <body>
		<header>
			<div class="cabecera">
				<div ><h1 id="letra_titulo">Paiement confirmation</h1></div>
			</div>
		</header>

		<main>
      <form id="paiement" action="" method="post">
      <p>Thank you for completing the registration form.<br/>
        Here is a summary of the paiement.</p>

      <?php
        $price = 100;

        if (isset($_GET['label_code']))
        {
          echo 'There is a discount with the promotional code.<br/>';
          $price = $price - 80;
        }
        else {
          echo 'No promotional code has been found.<br/>';
        }

        echo 'The total price for the event is of ' . $price . "€.<br/>";

      ?>
          <input type="submit" id="confirmar" name="confirmar" value="Confirmar" onclick="">
          <input type="submit" id="cancelar" name="cancelar" value="Cancelar" onclick="">
      </form>
    </main>
  </body>

</html>
