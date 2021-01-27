<?php
// include_once("conexion.php");
include("../model/conexion.php");
class Eusuario extends conexion
{
	public function Eusuario()
	{
		$this -> conectar();
	}
	public function validarUsuario($login,$password)
	{
		// $password = md5($password);
		$consulta = "SELECT * FROM usuario WHERE  DNI='$login'  AND '$password' = password AND estado = 1";
		$resultado = mysqli_query($this->conectar(),$consulta);
		$this -> desConectar();
		$aciertos = mysqli_num_rows($resultado);
		if($aciertos == 1)
			return(1);
		else
			return(0);
	}
}

?>
