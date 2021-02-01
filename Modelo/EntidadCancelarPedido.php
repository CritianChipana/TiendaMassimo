<?php
include_once('../Controlador/conexion.php');

class EntidadCancelarPedido extends conexion{

    function CancelarPedido($codigo,$tipo){
        $tipo2 = "id".$tipo;
       
        $consulta2 = "UPDATE $tipo set estadocomprobante=2 WHERE $tipo2=$codigo ";

        $resultado = mysqli_query($this->conectar(),$consulta2);
        $this->desconectar();

        return $resultado;

    }

}

?>