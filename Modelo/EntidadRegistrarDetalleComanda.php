<?php
include_once("../Controlador/conexion.php");

class EntidadRegistrarDetalleComanda extends conexion{

    public function RegistraDetalleComanda($numero,$cantidades,$precios,$idproductos,$idcomanda){
        for($i=0;$i<$numero;$i++){
            $sql="INSERT INTO detallecomanda(idcomanda, idproducto, cantidad, precio)
            VALUES ('$idcomanda','$idproductos[$i]','$cantidades[$i]','$precios[$i]')
            ";
            $resultado = mysqli_query($this->conectar(),$sql) or  die ("Error Resgistrando Detalle Comanda $i") ;
            $this->desconectar();
        }
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }
}

?>


<!-- INSERT INTO `detallecomanda`(`idcomanda`, `idProducto`, `cantidad`, `precio`) 
VALUES ("6","1","1","1") -->
<?php
// .
