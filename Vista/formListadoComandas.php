<?php 
	class formListadoComandas{

		public function formListadoComandasShow($listadocomandas,$listaPrivilegios){
			?>
			<?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow($listaPrivilegios);
			if (is_array($listadocomandas)) {
				$mensaje="";
			}else{
				$mensaje=$listadocomandas;
			}
			?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>ListadoComandas</title>
		</head>
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">
		<div >
			<?php  // var_dump($listaPrivilegios); ?>
		<p align="center">LISTADO DE COMANDAS</p>
		<form action="controlVerificarAccesoComprobante.php" method="POST">
			<p align="center">BUSCAR COMANDA POR ID :<input type="number" min="0" name="idcomanda" required>
			<input type="hidden" name="idbtn" value="1">
			<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
			<input type="submit" name="btnc" value="Buscar">
			</p>
		</form>
		<form action="controlVerificarAccesoComprobante.php" method="POST">
			<p align="center">
				<input type="hidden" name="idbtn" value="1">
				<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
				<input type="submit" name="fom1" value="Volver Atras">
			</p>
		</form>
			<p align="center"><?php echo $mensaje ?></p>
		<?php if (is_array($listadocomandas)): ?>
		<table border="1px" align="center" style="margin-top: 2rem">
			<thead>
				<tr>
					<th>Nr°</th>
					<th>Empleado</th>
					<th>dni</th>
					<th>fecha</th>
					<th>Estado</th>					
					<th colspan="3">ACCION</th>
				</tr>
			</thead>
			<?php
				if (isset($listadocomandas[1]['idcomanda'])) {
					if ($listadocomandas[0]['idcomanda']==$listadocomandas[1]['idcomanda']) {
						$numfilas=1;}
					else{
					$numfilas=count($listadocomandas);}}	
				else{
					$numfilas=count($listadocomandas);}				
			for ($i=0; $i <$numfilas ; $i++) {

			 	?>
					<tr>
					<td><?php echo $listadocomandas[$i]['idcomanda'] ?></td>
					<td><?php echo $listadocomandas[$i]['empleado'] ?></td>
					<td><?php echo $listadocomandas[$i]['dni'] ?></td>
					<td><?php echo $listadocomandas[$i]['fecha'] ?></td>					
					<td><?php echo $listadocomandas[$i]['estadocomprobante'] ?></td>
					<form  action="controlVerificarAccesoComprobante.php" method="POST">
					<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
					<input type="hidden" name="idbtn" value="1">
					<input type="hidden" name="idcomanda" value=" <?php echo $listadocomandas[$i]['idcomanda']; ?> ">
					<?php if ($listadocomandas[$i]['estadocomprobante']==1): ?>
					<td><input type="submit" name="btncb" value="Boleta"></td>
					<td><input type="submit" name="btncf" value="Factura"></td>
					<?php endif ?>
			
					</form>
					</tr>

			 	<?php
			 } ?>
		</table>					
		<?php endif ?>
			
		</div>
			<?php
		}
	}
 ?>