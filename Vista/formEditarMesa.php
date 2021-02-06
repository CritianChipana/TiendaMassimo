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
					EDITAR MESA <br>
 				Nr°<input type="text" name="idmesa" value="<?php echo $detallemesa[0]['idmesa'] ?>" disabled><br>
 				CAPACIDAD<input type="number" name="capacidad" value="<?php echo $detallemesa[0]['capacidad'] ?>"><br>		
				<input type="hidden" name="idmesa" value=" <?php echo $detallemesa[0]['idmesa'] ?> ">
				<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
				<input type="submit" name="btnconfirmaredit" value="CONFIRMAR">
				<input type="submit" name="fom1" value="VOLVER">
						<?php
					}
						else
					{
						?>
				AGREGAR MESA <br>
 				CAPACIDAD<input type="number" name="capacidad" ><br>	
				<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
				<input type="submit" name="btnagregarmesa" value="CONFIRMAR">
				<input type="submit" name="fom1" value="VOLVER">
						<?php
					}
					 ?>	
			</p>		 	
 			</form> 
 				
 			</div>
			
 			</div>
 		</body>
 		</html>



		<?php
		}
	}
 ?>