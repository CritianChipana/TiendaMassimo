<?php


include_once('../Controlador/conexion.php');
class EntidadBuscarComprobante extends conexion{
    
    public function validadComprobante($codigo,$tipo){
        $tipo2 = "id".$tipo;
        $consulta = "SELECT * from $tipo WHERE $tipo2=$codigo " ;
        $comprobante = mysqli_query($this->conectar(),$consulta) or die ("Error Resgistrando Comanda") ;
        $this->desconectar();
        // return $comprobante;
        $filas= mysqli_num_rows($comprobante);
        if($filas){
            
            for($i=0;$i<$filas;$i++){
                $arraydatos[$i] = mysqli_fetch_array($comprobante); 
            }
            return $comprobante;
        }else{
            return 0;
        }
    }

}

?>