<?php 
	class formDetalleComanda{

		public function formDetalleComandaShow($detalleComanda,$listaPrivilegios,$btnTC){
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
				$num_comanda=count($detalleComanda);
		//		echo $listaPrivilegios[0]['dni'];
		//		var_dump($detalleComanda);
				if ($btnTC=='Boleta') { ?>
					<div style="text-align:center;">
					<form action="controlVerificarAccesoComprobante.php" method="POST">	
					<p align="center">DETALLE DE COMANDA</p>
					<table border="1px" align="center" style="margin-top: 2rem">
						<thead>
							<tr><th colspan="4">--RESTAURANT MASSIMO--</th></tr>
							<tr><th colspan="4">ATENDIO: <?php echo $detalleComanda[0]['empleado']; ?></th></tr>
							<tr><th colspan="4">BOLETA A PAGAR</th></tr>
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
								<td><?php echo $detalleComanda[$i]['cantidad']; ?></td>
								<td><?php echo $detalleComanda[$i]['nombrepr']; ?></td>
								<td><?php echo $detalleComanda[$i]['precio']*$detalleComanda[$i]['cantidad']; ?></td>
							</tr>								
						</tbody>
						<?php 
						}
						 ?>
					</table>
					<input type="hidden" name="dni" value="<?php echo $listaPrivilegios[0]['dni'];  ?>">
					<input type="hidden" name="idbtn" value="1">
					<input type="hidden" name="btnCO" value="1">
					<input type="hidden" name="btnCOB" value="1">
					<input type="hidden" name="idcomanda" value="<?php echo $detalleComanda[0]['idcomanda'] ?>">
					<input align="center" type="submit" name="" value="GENERAR BOLETA">
					</form>
					<form action="controlVerificarAccesoComprobante.php" method="POST">
						<p align="center">
							<input type="hidden" name="idbtn" value="1">
							<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
							<input type="submit" name="btnc" value="Volver Atras">
						</p>
					</form>
					</div>							
				<?php		
				}
				else if($btnTC=='Factura'){ ?>
					<div style="text-align:center;">
					<form action="controlVerificarAccesoComprobante.php" method="POST">	
					<p align="center">DETALLE DE COMANDA</p>
					<table border="1px" align="center" style="margin-top: 2rem">
						<thead>
							<tr><th colspan="4">--RESTAURANT MASSIMO--</th></tr>
							<tr><th colspan="4">ATENDIO: <?php echo $detalleComanda[0]['empleado']; ?></th></tr>
							<tr><th colspan="4">FACTURA A PAGAR</th></tr>			
							<tr><th colspan="4">RUC: <input type="number" name="ruc" required=""> </th></tr>	
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
								<td><?php echo $detalleComanda[$i]['cantidad']; ?>	</td>
								<td><?php echo $detalleComanda[$i]['nombrepr']; ?></td>
								<td><?php echo $detalleComanda[$i]['precio']*$detalleComanda[$i]['cantidad']; ?></td>
							</tr>								
						</tbody>							
						<?php	
						}
						?>
					</table>
					<input type="hidden" name="dni" value="<?php echo $listaPrivilegios[0]['dni'];  ?>">
					<input type="hidden" name="idbtn" value="1">
					<input type="hidden" name="btnCO" value="1">
					<input type="hidden" name="btnCOF" value="1">
					<input type="hidden" name="idcomanda" value="<?php echo $detalleComanda[0]['idcomanda'] ?>">
					<input align="center" type="submit" name="" value="GENERAR FACTURA">
					</form>
					<form action="controlVerificarAccesoComprobante.php" method="POST">
						<p align="center">
							<input type="hidden" name="idbtn" value="1">
							<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
							<input type="submit" name="btnc" value="Volver Atras">
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