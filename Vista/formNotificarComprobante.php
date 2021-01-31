<?php 
	class formNotificarComprobante{

		public function formNotificarComprobanteShow($listaPrivilegios)
		{
?>
			<?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow($listaPrivilegios);
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>NotificarComprobante</title>
			</head>
			<body>
				<p><?php echo "COMPROBANTE DE PAGO INGRESADO"; ?> </p>
				
			</body>
			</html>
<?php
		}
	}
 ?>