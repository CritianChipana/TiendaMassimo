<?php
include_once("../Controlador/conexion.php");
class EntidadDetallesComanda extends conexion{

    public function listarComanda($idcomanda){

        $sql = "SELECT * from comanda C, detallecomanda D, producto P 
        where C.idcomanda =$idcomanda and D.idproducto = P.idproducto and C.idcomanda = D.idcomanda";
        $resultado =mysqli_query($this->conectar(),$sql);
        $this->desconectar();

        $filas = mysqli_num_rows($resultado);
        for($i=0;$i<$filas;$i++){
            $listaComanda[$i] = mysqli_fetch_array($resultado);
        }
        return $listaComanda;
    }

}
// SELECT * from comanda C, detallecomanda D, producto P where C.idcomanda =10 and
//  D.idProducto = P.idProducto and C.idcomanda = D.idcomanda
?>