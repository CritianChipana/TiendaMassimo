<?php 
	class formGenerarComprobante
	{
		public function formGenerarComprobanteShow($listaPrivilegios)
		{ 
			?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>FormOpciones</title>
		</head>
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">
		<?php
			include_once("../shared/nav.php");
			$objNav= new nav();
			$objNav->navShow($listaPrivilegios);
			$dni=$listaPrivilegios[0]['dni'];
		  ?>
		<body>
		<div style="text-align: center">
		<p>Escoja de donde desea generar el comprobante de pago</p>
		
	    <form  action="controlVerificarAccesoComprobante.php" method="POST">
	          	<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
	          	<input type="hidden" name="idbtn" value="1">
	          	<input type="submit" name="btnc" value="Comandas">
	          	<input type="submit" name="btnp" value="Proformas">
	    </form>	
		</div>

		</body>
		</html>
		<?php
		}
	}
 ?>