<?php
class conexion
{
	protected function conectar()
	{
		// $a =mysqli_connect('localhost','root','12345678','resta-massimo');
	      $a =mysqli_connect('localhost','root','admin','restaurante');
	//	$a =mysqli_connect('localhost','root','','massimo');
		return $a;
	}
	protected function desConectar()
	{
		mysqli_close($this->conectar());
	}
}
?>