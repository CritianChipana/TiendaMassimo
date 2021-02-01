<?php


include_once '../Controlador/conexion.php';

class usuarioPrivilegios extends conexion
{  
    public function obtenerPrivilegiosUsuario($login)
    {
        $consulta = "SELECT * FROM privilegios" .
            "   INNER JOIN usuarioprivilegio" .
            "   ON usuarioprivilegio.idprivilegio = privilegios.idprivilegio" .
            "   WHERE usuarioprivilegio.dni = $login"; 
        $resultado = mysqli_query($this->conectar(),$consulta);   
        $this -> desconectar(); 
 
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

    public function eliminarPrivilegiosUsuario($dni)
    {

        $consulta = "    DELETE FROM usuarioprivilegio" .
            "   WHERE usuarioprivilegio.dni = $dni";
       
        $this->conectar();
        $resultado = mysqli_query($this->conectar(),$consulta); 
        $this->desconectar ();
        return $resultado;
    }
	
   public function registrarPrivilegiosUsuario($privilegiosAsignados, $dni)
    {
        $privilegios = "";
        $j = 0;
        for ($j = 0; $j < count($privilegiosAsignados); $j++) {
            $privilegios = "(" . $dni . ", " . $privilegiosAsignados[$j]['idprivilegio'] . ");";
       
            $consulta = "    INSERT INTO usuarioprivilegio(dni, idprivilegio)
                    VALUES" . $privilegios;
         
        $this->conectar();
        $resultado = mysqli_query($this->conectar(),$consulta); 
        $this -> desconectar();  
        $resultado==TRUE;  
    }  
        return $resultado;
    }



}