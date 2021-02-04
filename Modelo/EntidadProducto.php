<?php
include_once("../Controlador/conexion.php");

class EntidadProducto extends conexion{

    function __construct()
    {
        $this->conectar();
    }

    public function listar_producto(){
        $consulta = "select * from producto";
        $resultado = mysqli_query($this->conectar(),$consulta);
        $this->desconectar();
        return $resultado;
    }
    public function agregarproducto($nombre,$descripcion,$precio){

<<<<<<< HEAD
        $consulta="INSERT INTO producto (nombrepr,descripcion,precio) VALUES ('$nombre','$descripcion',$precio)";
        $resultado=mysqli_query($this->conectar(),$consulta);
    }

=======
// .
>>>>>>> 7813f2df0311e53bb52b2cf8a9ee11e399fff6bc
}
?>