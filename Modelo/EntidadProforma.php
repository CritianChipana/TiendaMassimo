<?php 
include_once('../Controlador/conexion.php');

class EntidadProforma extends conexion{
    
      public function listarProforma()
      { 
            $consulta="SELECT * FROM proforma WHERE estadocomprobante=1";
            $resultado = mysqli_query($this->conectar(),$consulta);
            $this->desconectar();
            return $resultado;
      }
      public function detalleProformaID($idproforma)
      {
			$consulta = "SELECT * FROM detalleProforma DC, producto PR, proforma P,usuario U WHERE DC.idproforma = '$idproforma' AND DC.idproducto=PR.idproducto AND DC.idproforma=P.idproforma AND P.dni=U.dni";
			$resultado = mysqli_query($this->conectar(),$consulta);
                  $num_registros=mysqli_num_rows($resultado);

                  for ($i=0; $i <$num_registros ; $i++) { 
                        $fila[$i]=mysqli_fetch_array($resultado);
                  }
                  if (isset($fila)) {
                              return $fila;           
                  }
                  else
                  {
                        $fila="NO SE ENCONTRARON COINCIDENCIAS";
                        return $fila;
                  }
      }
// _______________________________________________________________________________________________________
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

// ____________________________________________________________________________________________


public function ListarProformashow($dni){
       
      $sql = "SELECT * FROM comanda where estadocomprobante = 1 and dni = $dni ";
      $resultado = mysqli_query($this->conectar(),$sql) or die ("Error Buscando Proforma");
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
   and C.estadocomprobante =1 and C.idcomanda =D.idcomanda" or die ("Error Buscando Proforma");
  $resultado =mysqli_query($this->conectar(),$sql);
  return $resultado;

}

// _________________________________________________________________________________________

public function RegistrarProforma($dni,$fecha,$estado,$dnicliente,$empleado,$importe,$mesa){
      $sql = "INSERT INTO 
              comanda(empleado, dni, fecha, idcliente, total, estadocomprobante,mesanum)
              VALUES('$empleado','$dni','$fecha','$dnicliente','$importe','$estado','$mesa')";
      // echo $sql;
      $resultado = mysqli_query($this->conectar(),$sql) or die ("Error Resgistrando Proforma");
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

  public function BuscarProforma($idcliente,$fecha){
      // $sql = "SELECT idcomanda FROM comanda WHERE idcliente = '$idcliente' and fecha = '$fecha' ";
      $sql2 = "SELECT max(idcomanda) from comanda";
      $resultado = mysqli_query($this->conectar(),$sql2) or die ("Error Buscando Proforma");
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
