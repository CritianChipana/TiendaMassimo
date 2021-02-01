<?php
session_start();
if(isset($_POST['bntAceptar']) )
{
	$login = strtolower(trim($_POST['login']));
	$password = $_POST['password'];
	if((strlen ($login)<3 or strlen($password)<3 )&& isset ($_SESSION['login'])) 
	{
		include_once("../shared/formMensajeSistema.php");
		$objMensaje = new formMensajeSistema;
		$objMensaje -> formMensajeSistemaShow2("datos no aceptables", "<a href='../index.php'>Intentar nuevamente</a>");
	}
	else
	{
		include_once("controllerAutenticarUsuario.php");
		$objControlAcceso = new controllerAutenticarUsuario;
		$objControlAcceso -> verificarUsuario($login,$password);
	}
}
else
{
	include_once("../shared/formMensajeSistema.php");
	$objMensaje = new formMensajeSistema;
	$objMensaje -> formMensajeSistemaShow2("ACCESO NO PERMITIDO...","<a href='../index.php'>Ir al inicio</a>");
}
?>
