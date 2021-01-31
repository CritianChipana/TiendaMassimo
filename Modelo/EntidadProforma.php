<?php 
include_once('../Controlador/conexion.php');

class EntidadProforma extends conexion{
    
      public function listarProforma()
      { 
            $consulta="SELECT * FROM proforma WHERE idestadocomprobante=1";
            $resultado = mysqli_query($this->conectar(),$consulta);
            $this->desconectar();
            return $resultado;
      }
      public function detalleProformaID($idproforma)
      {
			$consulta = "SELECT * FROM detalleProforma DC, producto PR, proforma P,usuario U WHERE DC.idproforma = '$idproforma' AND DC.idproducto=PR.idproducto AND DC.idproforma=P.idproforma AND P.DNI=U.DNI";
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
 }
 ?>
