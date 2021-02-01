
<?php

class formBuscarComprobante{

    function formBuscarComprobanteShow($listaPrivilegios){
        $dni = "";
        for($i=0;$i<1;$i++){
            $dni = $listaPrivilegios[$i]['dni'];
        }

        ?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>bienvenida</title>
		<link rel="stylesheet" type="text/css" href="../public/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../public/css/nav.css"> 
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">

		</head>
		<body>
		<?php include_once("../shared/nav.php");
			  $objNav=new nav();
			  $objNav->navShow($listaPrivilegios);
		 ?>
            <br><br><center>
            <form name="fomularioBuscar" action="controlCamposComprobante.php" method="post">
                <table>
                    <tr>
                        <td> <label for="codigo">Codigo Del Comprobante:</label><br></td>
                        <td><input type="number" name="codigo" id="codigo"></td>
                    </tr>
                    <tr>
                        <td> <label for="">Tipo de Comprobante:</label></td>
                        <td>
                                <select name="tipo" id="tipo">
                                    <option value="seleccione">Seleccione</option>
                                    <option value="boleta">Boleta</option>
                                    <option value="factura">Factura</option>
                                </select>
                        </td>
                    </tr>
                </table>
                <input type="text" value="<?php echo $dni ?>" name="dni" id="" hidden>
                <input name="botonbuscarcomprobante" type="submit" value="Buscar">
            </form>
            </center>
        
	
		</body>
		</html>
	
    
<?php
    }
}
// if(isset($_POST['volver'])){
//     $nuevo = new formBuscarComprobante;
//     $nuevo->formBuscarComprobanteShow();
// }

?>