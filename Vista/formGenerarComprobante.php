<?php 
	class formGenerarComprobante
	{
		public function formGenerarComprobanteShow($listaPrivilegios)
		{ ?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>dqwd</title>
		</head>
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">
		<?php
			include_once("../shared/nav.php");
			$objNav= new nav();
			$objNav->navShow($listaPrivilegios);
		  ?>
		<body>

			<a class="botoasn" href="controlVerificarAcceso.php?opc=1" >Comandas</a>
			<a class="botoasn" href="controlVerificarAcceso.php?opp=2" >Proformas</a>
		</body>
		</html>
		<?php
		}
	}
 ?>