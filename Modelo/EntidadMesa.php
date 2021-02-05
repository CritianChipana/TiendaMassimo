<?php 
	include_once("../Controlador/conexion.php");
	class EntidadMesa extends conexion{

		public function listarmesa(){

			$consulta="SELECT * FROM mesa";
			$resultado=mysqli_query($this->conectar(),$consulta);
			$this->desconectar();
			return $resultado;

		}

		public function agregarmesa($capacidad){
			
			$consulta="INSERT INTO mesa (capacidad,estado) VALUES ('$capacidad',1)";
			$resultado=mysqli_query($this->conectar(),$consulta);
			$this->desconectar();

		}		

		public function detallemesa($idmesa){

			$consulta="SELECT * FROM mesa WHERE idmesa='$idmesa'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			$this->desconectar();
			return $resultado;

		}

		public function editarmesa($idmesa,$capacidad){

			$consulta="UPDATE mesa SET  capacidad='$capacidad' WHERE idmesa='$idmesa'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			$this->desconectar();
			return $resultado;

		}

		public function habilitarmesa($idmesa){

			$consulta="UPDATE mesa SET estado=1 WHERE idmesa='$idmesa'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			$this->desconectar();
			return $resultado;

		}

		public function deshabilitarmesa($idmesa){

			$consulta="UPDATE mesa SET estado=0 WHERE idmesa='$idmesa'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			$this->desconectar();
			return $resultado;

		}
	}
 ?>