<?php
include_once("../Controlador/conexion.php");
class EntidadDetallesProforma extends conexion{

    public function listarProforma($idcomanda){

        $sql = "SELECT * from comanda C, detallecomanda D, producto P 
        where C.idcomanda =$idcomanda and D.idproducto = P.idproducto and C.idcomanda = D.idcomanda";
        $resultado =mysqli_query($this->conectar(),$sql);
        $this->desConectar();

        $filas = mysqli_num_rows($resultado);
        for($i=0;$i<$filas;$i++){
            $listaProforma[$i] = mysqli_fetch_array($resultado);
        }
        return $listaProforma;
    }

    // _______________________________________________________________
    public function EliminarPedido($iddetalleProforma){
        $sql=" DELETE FROM detallecomanda WHERE iddetallecomanda= $iddetalleProforma ";
        $resultado = mysqli_query($this->conectar(),$sql);
        return $resultado;
    }


// _____________________________________________________________

public function RegistraDetalleProforma($numero,$cantidades,$precios,$idproductos,$idcomanda){
    for($i=0;$i<$numero;$i++){
        $sql="INSERT INTO detallecomanda(idcomanda, idproducto, cantidad, precio)
        VALUES ('$idcomanda','$idproductos[$i]','$cantidades[$i]','$precios[$i]')
        ";
        $resultado = mysqli_query($this->conectar(),$sql) or  die ("Error Resgistrando Detalle Proforma $i") ;
        $this->desConectar();
    }
    if($resultado){
        return 1;
    }else{
        return 0;
    }
}

}
// SELECT * from comanda C, detallecomanda D, producto P where C.idcomanda =10 and
//  D.idProducto = P.idProducto and C.idcomanda = D.idcomanda
?>