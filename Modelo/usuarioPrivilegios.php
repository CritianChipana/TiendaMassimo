<?php


include_once '../Controlador/conexion.php';

class usuarioPrivilegios extends conexion
{  
    public function obtenerPrivilegiosUsuario($login)
    {
        $consulta = "SELECT * FROM privilegios" .
            "   INNER JOIN usuarioprivilegio" .
            "   ON usuarioprivilegio.idprivilegio = privilegios.idprivilegio" .
            "   WHERE usuarioprivilegio.DNI = $login"; 
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
	
   public function registrarPrivilegiosUsuario($privilegiosAsignados, $dni)
    {
        $privilegios = "";
        $j = 0;
        for ($j = 0; $j < count($privilegiosAsignados) - 1; $j++) {
            $privilegios .= "(" . $dni . ", " . $privilegiosAsignados[$j]['idprivilegio'] . "),";
        }

        $privilegios .= "(" . $dni . ", " . $privilegiosAsignados[$j]['idprivilegio'] . ")";

        $consulta = "    INSERT INTO usuarioprivilegio(DNI, idprivilegio)
                    VALUES" . $privilegios;
 
        //echo $consulta;  
        $this->conectar();
        $resultado = mysqli_query($this->conectar(),$consulta); 
        $this -> desconectar();
        return $resultado;
    }

    public function eliminarPrivilegiosUsuario($dni)
    {

        $consulta = "    DELETE FROM usuarioprivilegios" .
            "   WHERE usuarioprivilegio.DNI = $dni";

        $this->conectar();
        $resultado = mysqli_query($this->conectar(),$consulta); 
        $this->desconectar ();
        return $resultado;
    }

}