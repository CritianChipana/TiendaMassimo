<?php
class formMensajeSistema
{
	public function formMensajeSistemaShow($mensaje,$link,$listaPrivilegios,$btn,$btn2,$btn3)
	{
	?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Mensaje del sistema</title>
		</head>
		<body>
			<p align="center">
					<?php echo $mensaje ?> <?php echo "<br>" ?>
					<?php 
					?>
					<?php
					if (is_array($listaPrivilegios)) {?>
					<form action="<?php echo $link ?> " method="POST" >	
						<input type="hidden" name="idbtn" value="1">
						<input type="hidden" name="dni" value="<?php echo $listaPrivilegios[0]['dni'] ?>">
						<input type="hidden" name="<?php echo $btn ?>" value="<?php echo $btn; ?>">	
						<input type="hidden" name="<?php echo $btn2 ?>" value="<?php echo $btn3; ?>">	
					<?php 
					if (is_numeric($btn2)){?>
						<input type="hidden" name="<?php echo $btn2 ?>" value="<?php echo $btn2 ?>">	
					<?php
					}
					?>
						<p align="center"><input type="submit" name="atras" value="VOLVER ATRAS"></p>
					</form>
					 <?php
					 }
					 else{?>
					 	<br>
						<a href="<?php echo $link; ?>">INICIAR SESION</a>
					 <?php
					 }
					  ?>		  
			</p>		
		</body>
		</html>
	
	<?php	
	}

	public function formMensajeSistemaShow2($mensaje,$link)
	{
	?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Mensaje del sistema</title>
		</head>
		
		<body>
			<p><center><?php  echo strtoupper($mensaje);?></center></p>
			<p align="center"><?php echo $link;?></p>
			 
		</body>
		</html>
	
	<?php	
	}
	public function formMensajeComprobanteShow($mensaje,$link)
	{
	?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Mensaje del sistema</title>
		</head>
		
		<body>
			<p><center><?php  echo strtoupper($mensaje);?></center></p>
			<p align="center"><?php echo $link;?></p>
			 
		</body>
		</html>
	
	<?php	
	}


}
?>

