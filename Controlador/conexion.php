<?php
class conexion
{
	protected function conectar()
	{
		// $a =mysqli_connect('localhost','root','12345678','resta-massimo');
		$a =mysqli_connect('localhost','root','','crisis');
		// mysqli_select_db('sistema');
		return $a;
	}
	protected function desConectar()
	{
		mysqli_close($this->conectar());
		
	}
}
?>