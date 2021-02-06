<?php
class formAgregarPlatillo{

    public function AgregarPlatillo($idcomanda,$listaPrivilegios){

    }

    public function formSeleccionarPlatillo($listaprivilegios,$listaproductos,$idcomanda){
        ?>
        <!DOCTYPE html>
		<html>
		<head>
			<title>Generar Proforma</title>
		</head>
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">
		<?php
			include_once("../shared/nav.php");
			$objNav= new nav();
            $objNav->navShow($listaprivilegios);
            $nombre ="";
            $apellido ="";
            $dni =0;
            $empleado = "";
		  ?>
		<body>

			<!-- <a class="botoasn" href="controlVerificarAcceso.php?opc=1" >Proformas</a>
			<a class="botoasn" href="controlVerificarAcceso.php?opp=2" >Proformas</a> -->
        <?php for($i = 0; $i <1; $i++){
                
            ?>
              <P>Mesero: <?php echo $listaprivilegios[$i]['nombre']." ". $listaprivilegios[$i]['apellidos']?></P>
               <P>Usuario: <?php echo $listaprivilegios[$i]['dni'] ?></P>
            <?php
                $dni = $listaprivilegios[$i]['dni'];
                $empleado = $listaprivilegios[$i]['nombre']." ".$listaprivilegios[$i]['apellidos'];
        } ?>
        <hr>
        <center><form action="../Controlador/controlAgregarPedido.php" method="post">

            <table>
                <tr>
                    <th>Platillo</th>
                    <th>Precio</th>
                    <th>cantidad</th>
                    <th>Grabar</th>
                </tr>
        <?php
        $cont=0;
            foreach($listaproductos as $row){
                ?>
                <tr>
                    <td><?php echo $row['nombrepr'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td><input type="number" name="<?php echo $row['idproducto'];?>" id=""></td>
                    <td><input type="text" value="<?php echo $row['idproducto'] ?>" name="<?php echo $row['idproducto'];?>i" id="" hidden></td>
                    <td><input type="checkbox" value="<?php echo $row['precio'];?>" name="<?php echo $row['idproducto'];?>c" id=""></td>
                    
                </tr>
                <?php
                $cont++;
            }
            ?>
            </table>
            <br><hr><br>
            <input type="text" name="tamano" value="<?php echo $cont ?>" id="" hidden>
            <input type="text" name="idcomanda" value="<?php echo $idcomanda ?>" id="" hidden>
            <input type="text"  value="<?php echo $dni?>" name="dni"  hidden >
            <!-- <input type="text"  value="<?php ?>" name="empleado"  hidden > -->
            <input type="text"  value="<?php echo ""; ?>" name="apellido"  hidden >

            <!-- <label for="">Empleado:<br>
                <input type="text" name="empleado" id=""><br>
            </label>
            <label for="">Cliente<br>
                <input type="number" name="dnicliente" id=""><br>
            </label>
            <label for="">Fecha:<br>
                <input type="date" name="fecha" id=""><br>
            </label> -->
            <input name="aa" type="submit" value="Agregar">
            </form></center>
           
        <hr>
        <script src="../../js/capturarid.js"></script>


        </body>
        </html>
        <?php
    }
}


?>