<?php
class formComprobanteDevolucion{

    function formComprobanteDevolucionShow($arraydatos,$listaPrivilegios,$tipo){
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
		</head>
		<body>
		<?php include_once("../shared/nav.php");
			  $objNav=new nav();
			  $objNav->navShow($listaPrivilegios);
		 ?>

	    <?php	

            foreach($arraydatos as $row){

            ?><center> <h4>Comprobante Cancelada</h4>
            <form action="../Controlador/controlCerrarComanda.php" method="post">
                <input type="text" name="tipo" value="<?php echo $tipo?>" hidden id="">

                <table>
                    <tr>
                        <td><label for="">Codigo:</label><br></td>
                        <td><?php if($tipo == "boleta"){?>
                                <input value="<?php echo $row['idboleta']?>" type="text" name="codigo" disabled id="">
                                <?php }else{   ?>
                                <input value="<?php echo $row['idfactura']?>" type="text" name="codigo" disabled id="">
                                <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">Nombre:</label><br></td>
                        <td> <input disabled  value="<?php echo $row['empleado']?>" type="text" name="" id=""></td>
                    </tr>


                    <?php if($tipo=="factura"){?>
                    <tr>
                        <td> <label for="">RUC: </label><br></td>
                        <td> <input disabled  value="<?php echo $row['ruc']?>" type="text" name="" id=""></td>
                    </tr>
                    <?php     }     ?>

                    <tr>
                        <td><label for="">Fecha: </label><br></td>
                        <td><input disabled  value="<?php echo $row['fecha']?>" type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td> <label for="">Total:</label><br></td>
                        <td> <input  disabled value="<?php echo $row['total']?>" type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td> <label for="">Estado:</label><br></td>
                        <td> <label for="estado1">Pedido Cancelado
                                <input  type="radio" name="estado" id="estado1" checked>
                    </label></td>
                    </tr>

                </table>
                    <input type="text" name="dni" value="<?php echo $dni ?>" hidden id="">
                    <input type="submit" name="a" id="" value="salir">
            </form>
            </center>
		</body>
		</html>
                <?php
            
            }
    }
}


?>