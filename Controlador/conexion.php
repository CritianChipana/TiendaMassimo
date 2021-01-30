<?php
class conexion
{
	protected function conectar()
	{
		// $a =mysqli_connect('localhost','root','12345678','resta-massimo');
<<<<<<< HEAD
	       $a =mysqli_connect('localhost','root','admin','restaurante');
=======
		$a =mysqli_connect('localhost','root','','massimo');
>>>>>>> 81e51d8a20cb3cac32db14bc925af27ea9509acd
		// mysqli_select_db('sistema');
		return $a;
	}
	protected function desConectar()
	{
		mysqli_close($this->conectar());
	}
}
?>