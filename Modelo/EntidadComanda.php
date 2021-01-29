<?php 
include_once('../conexion.php');
class EntidadComanda extends conexion{
    
  	public function listarComanda()
  	{
        $consulta="SELECT * FROM comanda WHERE idestadocomprobante=1";
        $resultado = mysqli_query($this->conectar(),$consulta);
        $this->desconectar();
        return $resultado;

  	}

        
}

 ?>
