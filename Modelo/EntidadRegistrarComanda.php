<?php

include_once("../Controlador/conexion.php");
class EntidadRegistrarComanda extends conexion{
    // INSERT INTO `comanda`(`empleado`, `dni`, `fecha`, `estadocomprobante`, `dniCliente`, `importe`)
    //  VALUES ("Samantha","1234567","2020-10-10","1","7777777","150")
    public function RegistrarComanda($dni,$fecha,$estado,$dnicliente,$empleado,$importe,$mesa){
        $sql = "INSERT INTO 
                comanda(empleado, dni, fecha, estadocomprobante, idcliente, total,mesanum)
                VALUES('$empleado','$dni','$fecha','$estado','$dnicliente','$importe','$mesa')";
        // echo $sql;
        $resultado = mysqli_query($this->conectar(),$sql) or die ("Error Resgistrando Comanda");
        // $idcomanda2="SELECT max(idcomanda) from comanda";
        // $Ridcomanda1=mysqli_query($this->conectar(),$idcomanda2);
        $this->desConectar();
        // $Ridcomanda2 = mysqli_fetch_assoc($Ridcomanda1);
        if($resultado){
            return 1;
        }else{
            return 0;
        }

    }

    public function BuscarComanda($idcliente,$fecha){
        $sql = "SELECT idcomanda FROM comanda WHERE idcliente = '$idcliente' and fecha = '$fecha' ";
        $sql2 = "SELECT max(idcomanda) from comanda";
        $resultado = mysqli_query($this->conectar(),$sql2) or die ("Error Buscando Comanda");
        $this->desConectar();
        $dato = mysqli_fetch_assoc($resultado);
        // $aciertos = mysqli_num_rows($resultado);
        if($resultado){
            return $dato;
        }else{
            return "No sencontro Cliente";
        }
        // for($i=0;$i<$aciertos;$i++){
        //     $fila[$i] = mysqli_fetch_array($resultado);
        // }
        // return $fila;
    }

    

}


?>