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
		// $consulta = "SELECT nombre, apellidos, celular
		//              FROM usuario
		// 			 WHERE dni= $login";  U.apellido, U.estado

		$consulta = "SELECT P.nombre ,P.link,U.apellidos, U.estado
		             FROM usuario U, privilegios P, usuarioprivilegio DU
					 WHERE U.DNI = '$login' AND
					       U.DNI = DU.DNI AND
						   P.idprivilegio = DU.idprivilegio";

		$resultado = mysqli_query($this->conectar(),$consulta);
		// return $resultado;
		// $aciertos = mysqli_num_rows($resultado);
		$aciertos = mysqli_num_rows($resultado);
		for($i = 0; $i < $aciertos; $i++)
			$filaEncontrada[$i] = mysqli_fetch_array($resultado);
		return($filaEncontrada);
		$this -> desConectar();
	}
}
?>
