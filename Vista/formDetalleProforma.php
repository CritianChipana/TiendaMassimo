<?php 
	class formDetalleProforma{

		public function formDetalleProformaShow($detalleProforma,$listaPrivilegios,$btnTP){
			?>
			<?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow($listaPrivilegios);
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>DetalleComanda</title>
			</head>
			<link rel="stylesheet" type="text/css" href="../public/css/main.css">
			<body>
			<?php
				$num_comanda=count($detalleProforma);
			//	var_dump($detalleProforma);	
				if ($btnTP=='Boleta') { ?>
					<div style="text-align:center;">
					<form action="controlVerificarAccesoComprobante.php" method="POST">	
					<p align="center">DETALLE DE PROFORMA</p>
					<table border="1px" align="center" style="margin-top: 2rem">
						<thead>
							<tr><th colspan="4">--RESTAURANT MASSIMO--</th></tr>
							<tr><th colspan="4">ATENDIO: <?php echo $detalleProforma[0]['nombre']; ?></th></tr>
							<tr><th colspan="4">BOLETA A PAGAR</th></tr>
							<tr><th colspan="4">RUC: <?php echo $detalleProforma[0]['ruc']; ?> </th></tr>
							<tr><th colspan="2">FECHA: <?php echo date("d") . "/" . date("m") . "/" . date("Y") ?> </th>
								<th colspan="2">HORA: <?php echo date("G").":".date("i"); ?></th>
							</tr>
							<tr><th>Cantidad</th><th>Descripcion</th><th>Precio</th></tr>
						</thead>
						<?php 
						$suma=0;
						for ($i=0; $i <$num_comanda ; $i++) { ?>
						<tbody>
							<tr>
								<td><?php echo $detalleProforma[$i]['cantidad']; ?></td>
								<td><?php echo $detalleProforma[$i]['nombrepr']; ?></td>
								<td><?php echo $detalleProforma[$i]['precio']*$detalleProforma[$i]['cantidad']; ?></td>
							</tr>								
						</tbody>
						<?php 
						}
						 ?>
					</table>
					<input type="hidden" name="dni" value="123">
					<input type="hidden" name="idbtn" value="1">
					<input type="hidden" name="btnCO" value="1">
					<input type="hidden" name="btnPRB" value="1">
					<input type="hidden" name="idproforma" value="<?php echo $detalleProforma[0]['idproforma'] ?>">
					<input align="center" type="submit" name="" value="GENERAR BOLETA">
					</form>
					<form action="controlVerificarAccesoComprobante.php" method="POST">
						<p align="center">
							<input type="hidden" name="idbtn" value="1">
							<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
							<input type="submit" name="btnp" value="Volver Atras">
						</p>
					</form>
					</div>							
				<?php		
				}
				else if($btnTP=='Factura'){?>
					<div style="text-align:center;">
					<form action="controlVerificarAccesoComprobante.php" method="POST">	
					<p align="center">DETALLE DE PROFORMA</p>
					<table border="1px" align="center" style="margin-top: 2rem">
						<thead>
							<tr><th colspan="4">--RESTAURANT MASSIMO--</th></tr>
							<tr><th colspan="4">ATENDIO: <?php echo $detalleProforma[0]['nombre']; ?></th></tr>
							<tr><th colspan="4">FACTURA A PAGAR</th></tr>
							<tr><th colspan="4">RUC: <?php echo $detalleProforma[0]['ruc']; ?> </th></tr>
							<tr><th colspan="2">FECHA: <?php echo date("d") . "/" . date("m") . "/" . date("Y") ?> </th>
								<th colspan="2">HORA: <?php echo date("G").":".date("i"); ?></th>
							</tr>
							<tr><th>Cantidad</th><th>Descripcion</th><th>Precio</th></tr>
						</thead>
						<?php 
						$suma=0;
						for ($i=0; $i <$num_comanda ; $i++) { ?>
						<tbody>
							<tr>
								<td><?php echo $detalleProforma[$i]['cantidad']; ?></td>
								<td><?php echo $detalleProforma[$i]['nombrepr']; ?></td>
								<td><?php echo $detalleProforma[$i]['precio']*$detalleProforma[$i]['cantidad']; ?></td>
							</tr>								
						</tbody>
						<?php 
						}
						 ?>
					</table>
					<input type="hidden" name="dni" value="123">
					<input type="hidden" name="idbtn" value="1">
					<input type="hidden" name="btnCO" value="1">
					<input type="hidden" name="btnPRF" value="1">
					<input type="hidden" name="idproforma" value="<?php echo $detalleProforma[0]['idproforma'] ?>">
					<input align="center" type="submit" name="" value="GENERAR BOLETA">
					</form>
					<form action="controlVerificarAccesoComprobante.php" method="POST">
						<p align="center">
							<input type="hidden" name="idbtn" value="1">
							<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
							<input type="submit" name="btnp" value="Volver Atras">
						</p>
					</form>
					</div>	
				<?php
				}
			?>
			</body>
			</html>
			<?php
		}
	}
 ?>