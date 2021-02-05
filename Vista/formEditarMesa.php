<?php 
	class formEditarMesa{

		public function formEditarMesaShow($detallemesa,$listaprivilegios){?>
<?php 
		include_once("../shared/nav.php");
		$nav=new nav();
		$nav->navShow($listaprivilegios);
 ?>
 		<!DOCTYPE html>
 		<html>
 		<head>
 			<title>Editar Menu</title>
 		</head>
 		<body>
 			<div>
 				<div>
 			 	<form  action="controlVerificarAccesoMesa.php" method="POST">	
 			<p align="center">
					<?php 
						if (isset($detallemesa)) 
							{
					?>
 				Nr°<input type="text" name="idmesa" value="<?php echo $detallemesa[0]['idmesa'] ?>" disabled><br>
  				NUMERO DE MESA<input type="text" name="numero" value="<?php echo $detallemesa[0]['numero'] ?>" required><br>
 				CAPACIDAD<input type="text" name="capacidad" value="<?php echo $detallemesa[0]['capacidad'] ?>" required><br>
 				ESTADO<input type="text" name="estado" value="<?php echo $detallemesa[0]['estado'] ?>" required><br>		
				<input type="hidden" name="idmesa" value=" <?php echo $detallemesa[0]['idmesa'] ?> ">
				<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
				<input type="submit" name="btnconfirmaredit" value="CONFIRMAR">
						<?php
					}
						else
					{
						?>
				NUMERO DE MESA<input type="text" name="numero" required><br>
 				CAPACIDAD<input type="text" name="capacidad" required><br>
 				ESTADO<input type="text" name="estado" required><br>		
				<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
				<input type="submit" name="btnagregarmesa" value="CONFIRMAR">
						<?php
					}
					 ?>
 			</p>

 			</form> 						
 				</div>
			
 			</div>


 				<?php // var_dump($detallemenu) ?>
 				<?php// var_dump($listaprivilegios) ?>
 		</body>
 		</html>



		<?php
		}
	}
 ?>