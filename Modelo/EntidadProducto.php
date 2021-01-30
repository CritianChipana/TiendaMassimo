<?php

// include_once("../model/conexion.php");
// include_once("../../model/conexion.php");
include_once("../Controlador/conexion.php");

class EntidadProducto extends conexion{

    function __construct()
    {
        $this->conectar();
    }

    public function listar_producto(){
        $consulta = "select * from producto";
        $resultado = mysqli_query($this->conectar(),$consulta);
        $this->desConectar();
        return $resultado;
    }


}
?>