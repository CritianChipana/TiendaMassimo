<?php

class formMensajeCancelar{

    function mensajecancelar($codigo, $tipo){
        ?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Mensaje del sistema</title>
		</head>
		
		<body>
            <p><center><?php  echo strtoupper("
                                                Si su pedido no tiene 3 dias de anticipacion para su 
                                                cancelacion no se reembolsará su dinero<br>
                                                ¿Esta seguro que desea cancelar su pedido? 
                                                ");?></center></p><br><br>
            <div class="confirmar"><center>
                <form action="controlDecision.php" method="post">
                    <input type="text" name="tipo" value="<?php echo $tipo?>" hidden id="">
                    <input type="text" name="codigo2" value="<?php echo $codigo ?>" id="" hidden>
                    <input name="si" type="submit" value="SI">
                </form>
                <form action="controlDecision.php" method="post">
                    <input name="no" type="submit" value="NO">
                </form></center>
            </div>

		</body>
		</html>
	
	<?php	
    }

}

?>