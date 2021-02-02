<?php
// include_once("conexion.php");
// include_once("../../model/conexion.php");
	include_once("../Controlador/conexion.php"); 
class Eusuario extends conexion
{
	public function Eusuario()
	{
		$this -> conectar();
	}
	public function validarUsuario($login,$password)
	{
		// $password = md5($password);
		$consulta = "SELECT * FROM usuario WHERE  dni='$login'  AND '$password' = password AND estado = 1";
		$resultado = mysqli_query($this->conectar(),$consulta);
		$this -> desconectar();
		$aciertos = mysqli_num_rows($resultado);
		if($aciertos == 1)
			return(1);
		else
			return(0);
	}

	/* administrador*/

    public function registrarUsuario($dni, $password, $nombre, $apellidos, $celular, $direccion, $correo, $estado) {

        $consulta = "    INSERT INTO usuario (dni, password, nombre, apellidos, celular, direccion, correo, estado) " .
                "   VALUES($dni,'$password', '$nombre', '$apellidos', '$celular', '$direccion', '$correo', '$estado')";
        $this->conectar();
        $resultado = mysqli_query($this->conectar(),$consulta);  
        $this -> desconectar();
        return $resultado;
    }

    public function listarUsuarioPorDni($dni) {
        $consulta = " SELECT * FROM usuario   WHERE dni = $dni"; 
        $usuarioEncontrado =mysqli_query($this->conectar(),$consulta);
        $filas = mysqli_num_rows($usuarioEncontrado);
        if($filas!=0){
            return mysqli_fetch_array($usuarioEncontrado); 
        }else{
            return 0;
        } 

        $this->desconectar();
        echo $consulta;
        return $usuarioEncontrado;
    }

    

    public function listarUsuarios() { 

        $consulta = "select * from usuario";
        $resultado = mysqli_query($this->conectar(),$consulta);
        $this->desconectar();
        return $resultado;
    }

    public function modificarUsuario( $password, $nombre, $apellidos, $celular, $direccion, $correo, $estado, $dniActual) {

        $consulta = "    UPDATE usuario SET  usuario.password = '$password', usuario.nombre = '$nombre', usuario.apellidos = '$apellidos', usuario.celular = '$celular', usuario.direccion = '$direccion', usuario.correo = '$correo', usuario.estado = '$estado'" .
                "   WHERE usuario.dni = $dniActual";
        //echo $consulta;   
        $resultado = mysqli_query($this->conectar(),$consulta);    
        $this->desconectar();
        return  $resultado;
    }
 

		/* administrador*/

}

?>
