<?php

class formMostrarComanda{

    public function formMostrarComandaShow($listaprivilegios,$comanda,$cont){

        ?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>bienvenida</title>
		<link rel="stylesheet" type="text/css" href="../public/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../public/css/nav.css"> 
		</head>
		<body>
        <?php 
              include_once("../shared/nav.php");
			  $objNav=new nav();
			  $objNav->navShow($listaprivilegios);
			  $dni=0;
		 ?>

		 <div>
		 
		 	<?php for($i = 0; $i <1; $i++){
                
				?>
				  <P>Mesero: <?php echo $listaprivilegios[$i]['nombre']." ". $listaprivilegios[$i]['apellidos']?></P>
				   <P>Usuario: <?php echo $listaprivilegios[$i]['dni'] ?></P>
				<?php
				$dni=$listaprivilegios[$i]['dni'];
			} ?>
		 
		 <form action="../Controlador/controlCerrarComanda.php" method="post">

			<table>
				<tr>
					<th>Platillo</th>
					<th>Precio</th>
					<th>cantidad</th>
					
				</tr>
			<?php
			
			for($i = 0; $i <$cont; $i++){
				?>
				<tr>
					<td><?php echo $comanda[$i]['nombrepr'] ?></td>
					<td><?php echo $comanda[$i]['precio'] ?></td>
					<td><?php echo $comanda[$i]['cantidad'] ?></td>
					
					
					
				</tr>
				<?php
				
			}
			?>
			</table>
			<br><hr><br>
			<input type="text" name="dni" id="" value="<?php echo $dni ?>" hidden>
			<input name="a" type="submit" value="Cerrar">
		</form>

			
		 </div>

		</body>
		</html>
	<?php

    }

}

?>
