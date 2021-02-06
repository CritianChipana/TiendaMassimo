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
<<<<<<< HEAD
    /*
    public function agregarproducto($nombre,$descripcion,$precio){ 
        $consulta="INSERT INTO producto (nombrepr,descripcion,precio) VALUES ('$nombre','$descripcion',$precio)";
        $resultado=mysqli_query($this->conectar(),$consulta);
   
    } */
=======
    public function agregarproducto($nombre,$descripcion,$precio){

        $consulta="INSERT INTO producto (nombrepr,descripcion,precio) VALUES ('$nombre','$descripcion',$precio)";
        $resultado=mysqli_query($this->conectar(),$consulta);
    }

>>>>>>> ebda0f39a136645122d22327b06ff40a93a3a5b8
}
?>