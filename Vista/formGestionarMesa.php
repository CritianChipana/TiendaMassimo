<?php 
	class formGestionarMesa{

		public function formGestionarMesaShow($listamesa,$listaprivilegios){?>
<?php 
		include_once("../shared/nav.php");
		$nav=new nav();
		$nav->navShow($listaprivilegios);
 ?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Gestionar Mesa</title>
		</head>
		<body>
		<p align="center">LISTADO DE MESAS</p>
		<form action="controlVerificarAccesoMesa.php" method="POST">
		<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
		<input type="hidden" name="idbtn" value="1">
		<p align="center"><input type="submit" name="btnaddmesa" value="AGREGAR MESA"></p>
		</form>
		<table border="1px" align="center" style="margin-top: 2rem">
			<thead>
				<tr>
					<th>Nr de mesa°</th>
					<th>Capacidad</th>
					<th>Estado</th>					
					<th colspan="2">ACCION</th>
				</tr>
			</thead>
			<?php
					$numfilas=count($listamesa);			
			foreach ($listamesa as $key => $value) {?>
			 <tr>
			 	<td><?php echo $value['idmesa']; ?> </td>
			 	<td><?php echo $value['capacidad']; ?> </td>
				<?php if ($value['estado']==1): ?>
					<?php $MENSAJE="ACTIVO"; ?>
				<?php else: ?>
					<?php $MENSAJE="INACTIVO"; ?>
				<?php endif ?>
			 	<td><?php echo $MENSAJE ?> </td>
			 	<form  action="controlVerificarAccesoMesa.php" method="POST">			 	
			 	<td><input type="submit" name="btneditar" value="Editar"></td>
			 	<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
			 	<input type="hidden" name="idmesa" value=" <?php echo $value['idmesa']; ?> ">
				<?php if ($value['estado']==0): ?>
				<td><input type="submit" name="btnhabilitar" value="Cambiar Estado"></td>
				<?php else: ?>
				<td><input type="submit" name="btndeshabilitar" value="Cambiar Estado"></td>
				<?php endif ?>
				</form>
			 </tr>

			<?php
			 } ?>
		</table>
			<?php //var_dump($listamenu); ?>
			<?php //var_dump($listaprivilegios); ?>
		</body>
		</html>
<?php
		}
	}
 ?>