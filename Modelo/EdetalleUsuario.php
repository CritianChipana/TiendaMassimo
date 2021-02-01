<?php
	include_once("../Controlador/conexion.php");

	class EdetalleUsuario extends conexion
	{
		public function EdetalleUsuario()
		{
			$this -> conectar();
		}
		public function obtenerPrivilegios($login)
		{
			$consulta = "SELECT * FROM usuario U, privilegios P, usuarioprivilegio DU WHERE U.DNI = '$login' AND U.DNI = DU.DNI AND P.idprivilegio = DU.idprivilegio";
			$resultado = mysqli_query($this->conectar(),$consulta);
			$aciertos = mysqli_num_rows($resultado);
			for($i = 0; $i < $aciertos; $i++)
				$filaEncontrada[$i] = mysqli_fetch_array($resultado);
			return($filaEncontrada);
			$this -> desConectar();
		}
	} 
?>
<!-- . -->