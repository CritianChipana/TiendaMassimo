<?php
include_once('conexion.php');

class EntidadCancelarPedido extends conexion{

    function CancelarPedido($codigo,$tipo){

       
        $consulta2 = "UPDATE $tipo set estado=0 WHERE id=$codigo ";

        $resultado = mysqli_query($this->conectar(),$consulta2);
        $this->desconectar();

        return $resultado;

    }

}

?>