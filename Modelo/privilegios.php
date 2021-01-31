<?php

include_once '../Controlador/conexion.php';

class Privilegios extends Conexion
{   function __construct()
    {
        $this->conectar();
    }
 
    
    public function  obtenerPrivilegioSistema()
    {
        $consulta = "SELECT * FROM privilegios";
        $this->conectar(); 
        $resultado = mysqli_query($this->conectar(),$consulta);  
        $this->desconectar(); 
        $filas = mysqli_num_rows($resultado);
        if($filas!=0){

            for($i=0;$i<$filas;$i++){
                $arraydatos[$i] = mysqli_fetch_array($resultado); 
            }
            return $resultado;
        }else{
            return 0;
        } 

        
    } 
  

}