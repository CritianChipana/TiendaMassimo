<?php
class conexion
{
	protected function conectar()
	{
		$a =mysqli_connect('localhost','root','12345678','massimo-luis');
		// $a =mysqli_connect('localhost','root','','rata');
		//$a =mysqli_connect('localhost','root','admin','massimo');
		// mysqli_select_db('sistema');
		return $a;
	}
	protected function desconectar()
	{
		mysqli_close($this->conectar());
		
	}
}
?>