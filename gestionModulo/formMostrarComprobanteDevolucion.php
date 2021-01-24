
<?php

class formMostrarComprobanteDevolucion{

    function mostrarDatosComprobante($arraydatos,$tipo){

        foreach($arraydatos as $row){

            ?>
            <form action="controlVerificarCancelacion.php" method="post">
                <input type="text" name="tipo" value="<?php echo $tipo?>" hidden id="">
                <label for="">Codigo:
                    <input value="<?php echo $row['id']?>" type="text" name="codigo" id="">
                </label><br>
                <label for="">Nombre:
                    <input disabled  value="<?php echo $row['nombre']?>" type="text" name="" id="">
                </label><br>
                <label for="">Apellido:
                    <input disabled  value="<?php echo $row['apellido']?>" type="text" name="" id="">
                </label><br>
                <label for="">Edad:
                    <input  disabled value="<?php echo $row['edad']?>" type="text" name="" id="">
                </label><br>
                <label for="">Fecha:
                    <input  disabled value="<?php echo $row['fecha']?>" type="text" name="" id="">
                </label><br>
                <label for="">Detalles:
                    <!-- <input  type="text" name="" id=""> -->
                    <textarea disabled  value="<?php echo $row['detalle']?>" name="" id="" cols="30" rows="10"></textarea>
                </label><br>
                <label for="">Estado:
                
                <?php
                    if($row['estado'] == 1){
                    ?>
                        <label for="estado1">Atendido
                            <input  disabled type="radio" name="estado" id="estado1">
                        </label>
                        <label for="estado2">Por atender
                            <input disabled  type="radio" name="estado" checked id="estado2">
                        </label>
                    <?php
                    }else{
                    ?>
                        <label for="estado1">Atendido
                            <input disabled  type="radio" name="estado" checked id="estado1">
                        </label>
                        <label for="estado2">Por atender
                            <input disabled  type="radio" name="estado" id="estado2">
                        </label>
                    <?php

                    } 
                ?>
                </label><br>

                <input name="botoncancelarpedido" type="submit" value="cancelar Pedido">

            </form>
            <?php
        }
        
    }


}


?>

