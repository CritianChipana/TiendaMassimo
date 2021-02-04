<?php

include_once("../Controlador/conexion.php");

class EntidadListarComanda extends conexion{

    public function ListarComandaShow($dni){
       
            $sql = "SELECT * FROM comanda where estadocomprobante = 1 and dni = $dni ";
            $resultado = mysqli_query($this->conectar(),$sql) or die ("Error Buscando Comanda");
            return $resultado;
    
        
    }

    public function Cancelar($idcomanda){
        $sql = "UPDATE comanda SET estadocomprobante=0 where idcomanda=$idcomanda";
        $resultado = mysqli_query($this->conectar(),$sql);
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    public function ListarPedido($idcomanda){
        $sql="SELECT * FROM comanda C, detallecomanda D, producto P where C.idcomanda =$idcomanda and D.idproducto = P.idproducto
         and C.estadocomprobante =1 and C.idcomanda =D.idcomanda" or die ("Error Buscando Comanda");
        $resultado =mysqli_query($this->conectar(),$sql);
        return $resultado;

    }


    public function EliminarPedido($iddetalleComanda){
        $sql=" DELETE FROM detallecomanda WHERE iddetallecomanda= $iddetalleComanda ";
        $resultado = mysqli_query($this->conectar(),$sql);
        return $resultado;
    }


    public function Listarmesas3(){
        $sql = "SELECT * FROM mesa WHERE disponible=1 ";
        $resultado = mysqli_query($this->conectar(),$sql);
        return $resultado;
    }


}

// <!-- SELECT * FROM comanda C, detallecomanda D, producto P where C.idcomanda =73 and D.idproducto = P.idproducto and C.estadocomprobante =1 and C.idcomanda =D.idcomanda -->

?>