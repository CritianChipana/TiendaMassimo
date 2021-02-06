<?php 
	class formGestionarMenu{

		public function formGestionarMenuShow($listamenu,$listaprivilegios){?>
<?php 
		include_once("../shared/nav.php");
		$nav=new nav();
		$nav->navShow($listaprivilegios);
 ?>
		<!DOCTYPE html>
		<html>
		<head>
			<META HTTP-EQUIV="REFRESH" CONTENT="formGestionarMenu.php">
			<title>Gestionar Menu</title>

		</head>
		<body>
		<p align="center">LISTADO DE MENUS</p>
		<form action="controlVerificarAccesoMenu.php" method="POST">
		<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
		<input type="hidden" name="idbtn" value="1">
		<p align="center"><input type="submit" name="btnaddmenu" value="AGREGAR MENU"></p>
		</form>
		<table border="1px" align="center" style="margin-top: 2rem">
			<thead>
				<tr>
					<th>Nr°</th>
					<th>Nombre del Menu</th>
					<th>Descripcion</th>
					<th>Precio</th>
					<th>Estado</th>					
					<th colspan="2">ACCION</th>
				</tr>
			</thead>
			<?php
					$numfilas=count($listamenu);			
			foreach ($listamenu as $key => $value) {?>
			 <tr>
			 	<td><?php echo $value['idproducto']; ?> </td>
			 	<td><?php echo $value['nombrepr']; ?> </td>
			 	<td><?php echo $value['descripcion']; ?> </td>
			 	<td><?php echo $value['precio']; ?> </td>
			 	<td><?php echo $value['estado']; ?> </td>
			 	<form  action="controlVerificarAccesoMenu.php" method="POST">			 	
			 	<td><input type="submit" name="btneditar" value="Editar"></td>
			 	<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
			 	<input type="hidden" name="idproducto" value=" <?php echo $value['idproducto']; ?> ">
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