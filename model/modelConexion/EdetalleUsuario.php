<?php
include_once("../model/conexion.php");
class EdetalleUsuario extends conexion
{
	public function EdetalleUsuario()
	{
		$this -> conectar();
	}
	public function obtenerPrivilegios($login)
	{
		$consulta = "SELECT nombre, apellidos, celular
		             FROM usuario
					 WHERE dni= $login"; 
		$resultado = mysqli_query($this->conectar(),$consulta);
		$this -> desConectar();
		$aciertos = mysqli_num_rows($resultado);
		for($i = 0; $i < $aciertos; $i++)
			$filaEncontrada[$i] = mysqli_fetch_array($resultado);
		return($filaEncontrada);
	}
}
?>
