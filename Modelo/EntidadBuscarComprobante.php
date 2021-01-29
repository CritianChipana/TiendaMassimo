<?php


include_once('../conexion.php');
class EntidadBuscarComprobante extends conexion{
    
    public function validadComprobante($codigo,$tipo){
        $consulta = "SELECT * from $tipo WHERE id=$codigo ";
        $comprobante = mysqli_query($this->conectar(),$consulta);
        $this->desconectar();

        $filas = mysqli_num_rows($comprobante);
        if($filas!=0){

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