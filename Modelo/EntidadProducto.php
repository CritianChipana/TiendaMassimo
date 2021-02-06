<?php
include_once("../Controlador/conexion.php");

class EntidadProducto extends conexion{

    function __construct()
    {
        $this->conectar();
    }

    public function listar_producto(){
        $consulta = "select * from producto";
        $resultado = mysqli_query($this->conectar(),$consulta) or die("No se encontro productos");
        $this->desconectar();
        return $resultado;
    }
    public function agregarproducto($nombre,$descripcion,$precio){

        $consulta="INSERT INTO producto (nombrepr,descripcion,precio) VALUES ('$nombre','$descripcion',$precio)";
        $resultado=mysqli_query($this->conectar(),$consulta);
    }




}
?>