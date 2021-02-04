<?php

include_once("../Controlador/conexion.php");
class EntidadRegistrarComanda extends conexion{
    // INSERT INTO `comanda`(`empleado`, `dni`, `fecha`, `estadocomprobante`, `dniCliente`, `importe`)
    //  VALUES ("Samantha","1234567","2020-10-10","1","7777777","150")
    public function RegistrarComanda($dni,$fecha,$estado,$dnicliente,$empleado,$importe){
        $sql = "INSERT INTO 
                comanda(empleado, dni, fecha, estadocomprobante, idcliente, total)
                VALUES('$empleado','$dni','$fecha','$estado','$dnicliente','$importe')";
        // echo $sql;
        $resultado = mysqli_query($this->conectar(),$sql) or die ("Error Resgistrando Comanda");
        $this->desconectar();
        if($resultado){
            return 1;
        }else{
            return 0;
        }

    }

    public function BuscarComanda($idcliente,$fecha){
        $sql = "SELECT idcomanda FROM comanda WHERE idcliente = '$idcliente' and fecha = '$fecha' ";
        $resultado = mysqli_query($this->conectar(),$sql);
        $this->desconectar();
        $dato = mysqli_fetch_assoc($resultado);
        // $aciertos = mysqli_num_rows($resultado);
        if($resultado){
            return $dato['idcomanda'];
        }else{
            return "No sencontro Cliente";
        }
        // for($i=0;$i<$aciertos;$i++){
        //     $fila[$i] = mysqli_fetch_array($resultado);
        // }
        // return $fila;
    }

}

// $consulta = "SELECT * FROM usuario U, privilegios P, usuarioprivilegio DU WHERE U.dni = '$login' AND U.dni = DU.dni AND P.idprivilegio = DU.idprivilegio";
// 			$resultado = mysqli_query($this->conectar(),$consulta);
// 			$aciertos = mysqli_num_rows($resultado);
// 			for($i = 0; $i < $aciertos; $i++)
// 				$filaEncontrada[$i] = mysqli_fetch_array($resultado);
// 			return($filaEncontrada);
// 			$this -> desconectar();

?>
<!-- . -->
 <!-- insertar comanda

 INSERT INTO `comanda`(`dni`, `fecha`, `estado`, `dniCliente`, `empleado`, `importe`)
  VALUES ("1234567","2020-01-01","1","74309273","carlos Moreno","120") -->

<!-- insertar detalles comanda -->

<!-- INSERT INTO `detalle_comanda`( `cantidad`, `precio`, `idProducto`, `idcomanda`)
 VALUES ("2","35","2","6") -->