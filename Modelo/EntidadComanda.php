<?php 
include_once('../Controlador/conexion.php');

class EntidadComanda extends conexion{
    
  	public function listarComanda()
  	{ 
  		$a =mysqli_connect('localhost','root','admin','restaurante');
        $consulta="SELECT * FROM comanda ";
        $resultado = mysqli_query($this->conectar(),$consulta);
        $this->desconectar();
        return $resultado;
 	} 
 }
 ?>
