<?php 
	class formAgregarMesa{

		public function formAgregarMesaShow($detallemesa,$listaprivilegios){?>
<?php 
		include_once("../shared/nav.php");
		$nav=new nav();
		$nav->navShow($listaprivilegios);
 ?>
 		<!DOCTYPE html>
 		<html>
 		<head>
 			<title>Agregar Mesa</title>
 		</head>
 		<body>
 			<div>
 			<div>
 			 <form  action="controlVerificarAccesoMesa.php" method="POST">	
 				<p align="center">	
				AGREGAR MESA <br>
 				CAPACIDAD<input type="number" name="capacidad" ><br>	
				<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 	<input type="hidden" name="idbtn" value="1">
				<input type="submit" name="btnagregarmesa" value="CONFIRMAR">
				<input type="submit" name="fom1" value="VOLVER">
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