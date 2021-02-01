<?php 
	class formListadoProformas{

		public function formListadoProformasShow($listadoproformas,$listaPrivilegios){
?>
			<?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow($listaPrivilegios);
			if (is_array($listadoproformas)) {
				$mensaje="";
			}else{
				$mensaje=$listadoproformas;
				
			}
			?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>ListadoProformas</title>
		</head>
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">
		<body>
		<p align="center">LISTADO DE PROFORMAS</p>
		<form action="controlVerificarAccesoComprobante.php" method="POST">
			<p align="center">BUSCAR PROFORMA POR ID :<input type="text" name="idproforma">
			<input type="hidden" name="idbtn" value="1">
			<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
			<input type="submit" name="btnp" value="Buscar">
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
		<?php if (is_array($listadoproformas)): ?>
		<table border="1px" align="center" style="margin-top: 2rem">
		<thead>
				<tr>
					<th>ID</th>
					<th>idcliente</th>
					<th>Empleado</th>
					<th>fecha</th>
					<th>fechaentrega</th>
					<th>ruc</th>
					<th>Total</th>
					<th>idestadocomprobante</th>
					<th colspan="2">GENERAR</th>
				</tr>
			</thead>
			<?php
				if (isset($listadoproformas[1]['idproforma'])) {
					if ($listadoproformas[0]['idproforma']==$listadoproformas[1]['idproforma']) {
						$numfilas=1;}
					else{
					$numfilas=count($listadoproformas);}}	
				else{
					$numfilas=count($listadoproformas);}	
			for ($i=0 ; $i<$numfilas; $i++){
			?>
						<tr>
						<td><?php echo $listadoproformas[$i]['idproforma'] ?></td>
						<td><?php echo $listadoproformas[$i]['dni'] ?></td>
						<td><?php echo $listadoproformas[$i]['idcliente'] ?></td>
						<td><?php echo $listadoproformas[$i]['fecha'] ?></td>
						<td><?php echo $listadoproformas[$i]['fechaentrega'] ?></td>
						<td><?php echo $listadoproformas[$i]['ruc'] ?></td>
						<td><?php echo $listadoproformas[$i]['total'] ?></td>
						<td><?php echo $listadoproformas[$i]['estadocomprobante'] ?></td>
						<form  action="controlVerificarAccesoComprobante.php" method="POST">
						<input type="hidden" name="dni" value=" <?php echo $listaPrivilegios[0]['dni']; ?> ">
						<input type="hidden" name="idbtn" value="1">
						<input type="hidden" name="idproforma" value=" <?php echo $listadoproformas[$i]['idproforma']; ?> ">

						<?php if ($listadoproformas[$i]['estadocomprobante']==1): ?>
						<?php if (($listadoproformas[$i]['ruc'])>0)
						{?>
						<td><input type="submit" name="btnpf" value="Factura"></td>		
						<?php  
						}
						else{?>
						<td><input type="submit" name="btnpb" value="Boleta"></td>
						<?php
						}?>								
						<?php endif ?>
						</form>
						</tr>
			<?php	
			}
			?>	
		</table>			
		<?php endif ?>
			
		</section>					
		</body>
<?php
	//var_dump($listadoproformas);
			}
	}
 ?>