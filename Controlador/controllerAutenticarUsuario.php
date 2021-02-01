<?php
class controllerAutenticarUsuario
{
	public function verificarUsuario($login,$password)
	{
		// include_once("../model/Eusuario.php");
		include_once("../Modelo/Eusuario.php");
		$objUser  = new Eusuario;
		// $password = md5($password);
		$respuesta = $objUser -> validarUsuario($login,$password);
		if($respuesta == 0)
		{
			include_once("../shared/formMensajeSistema.php");
			$objMensaje = new formMensajeSistema;
			$objMensaje -> formMensajeSistemaShow2("usuario no encontrado o inhabilitado en el sistema...","<a href='../index.php'>Ir al inicio</a>");
		}
		else
		{
		 
			$_SESSION["login"]=$login;
			// include_once("../model/EdetalleUsuario.php");
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("../Vista/formBienvenida.php");
			$objDetalle = new EdetalleUsuario;
			$objBienvenida = new formBienvenida;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($login);
			$objBienvenida -> formBienvenidaShow($listaPrivilegios);
			
		}
	}
}
?>