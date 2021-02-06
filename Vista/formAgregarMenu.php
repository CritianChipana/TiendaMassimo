<?php 
	class formAgregarMenu{

		public function formAgregarMenuShow($detallemenu,$listaprivilegios){?>
		<?php 
		include_once("../shared/nav.php");
		$nav=new nav();
		$nav->navShow($listaprivilegios);
 		?>
 		<!DOCTYPE html>
 		<html>
 		<head>
 			<title>Agregar Menu</title>
 		</head>
 		<body>
 			<div>
 			<div>
 			 	<form  action="controlVerificarAccesoMenu.php" method="POST">	
 			<p align="center">
			  				NOMBRE DEL MENU<input type="text" name="nombrepr" required><br>
			 				DESCRIPCION <textarea name="descripcion" rows="2" cols="45" required ></textarea><br>
			 				PRECIO<input type="number" name="precio"  required><br>
			 				ESTADO<input type="number" name="estado"  required><br>		
							<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 				<input type="hidden" name="idbtn" value="1">
			 				<input type="submit" name="btnagregarmenu" value="AGREGAR">		
					}
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