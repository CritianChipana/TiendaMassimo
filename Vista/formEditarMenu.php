<?php 
	class formEditarMenu{

		public function formEditarMenuShow($detallemenu,$listaprivilegios){?>
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
 			 	<form  action="controlVerificarAccesoMenu.php" method="POST">	
 			<p align="center">

			 				Nr°<input type="text" name="idproducto" value="<?php echo $detallemenu[0]['idproducto'] ?>" disabled><br>
			  				NOMBRE DEL MENU<input type="text" name="nombrepr" value="<?php echo $detallemenu[0]['nombrepr'] ?>" required><br>
			 				DESCRIPCION <textarea name="descripcion" rows="2" cols="45" required ><?php echo $detallemenu[0]['descripcion']?></textarea><br>
			 				PRECIO<input type="number" name="precio" value="<?php echo $detallemenu[0]['precio'] ?>" required><br>
			 				ESTADO<input type="number" name="estado" value="<?php echo $detallemenu[0]['estado'] ?>" required><br>		
							<input type="hidden" name="idproducto" value=" <?php echo $detallemenu[0]['idproducto'] ?> ">
							<input type="hidden" name="dni" value=" <?php echo $listaprivilegios[0]['dni']; ?> ">
			 				<input type="hidden" name="idbtn" value="1">
						 	<input type="submit" name="btnconfirmaredit" value="CONFIRMAR">		
									
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