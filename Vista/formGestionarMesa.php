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
		<table border="1px" align="center" style="margin-top: 2rem">
			<thead>
				<tr>
					<th>Nr°</th>
					<th>Número de mesa</th>
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
			 	<td><?php echo $value['numero']; ?> </td>
			 	<td><?php echo $value['capacidad']; ?> </td>
			 	<td><?php echo $value['estado']; ?> </td>
			 	<form  action="controlVerificarAccesoMesa.php" method="POST">			 	
			 	<td><input type="submit" name="btneditar" value="Editar"></td>
			 	<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
			 	<input type="hidden" name="idmesa" value=" <?php echo $value['idmesa']; ?> ">
				<?php if ($value['estado']==0): ?>
				<td><input type="submit" name="btnhabilitar" value="-Habilitar-"></td>
				<?php else: ?>
				<td><input type="submit" name="btndeshabilitar" value="Deshabilitar"></td>
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