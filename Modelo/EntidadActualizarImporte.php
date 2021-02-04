<?php

include_once("../Controlador/conexion.php");

class EntidadActualizarImporte extends conexion{

    public function ObtenerTotal($idcomanda){
        $sql = "SELECT total from comanda where idcomanda=$idcomanda";
        $Resultado = mysqli_query($this->conectar(),$sql );
        $this->desConectar();
        $total = mysqli_fetch_assoc($Resultado);
        if($Resultado){
            return $total["total"];
        }else{
            return "No se encontro TOtal";
        }

    }

    public function ActualizarTotal($idcomanda,$newimporte){
        $sql = "UPDATE comanda SET total= $newimporte where idcomanda = $idcomanda";
        $resultado = mysqli_query($this->conectar(),$sql);
        $this->desConectar();
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

}


?>