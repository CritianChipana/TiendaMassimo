<?php 
	include_once("../Controlador/conexion.php");
	class EntidadMesa extends conexion{

		public function listarmesa(){

			$consulta="SELECT * FROM mesa";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;

		}

		public function agregarmesa($numero,$capacidad,$estado){
			
			$consulta="INSERT INTO mesa (numero,capacidad,estado) VALUES ('$numero','$capacidad',$estado)";
			$resultado=mysqli_query($this->conectar(),$consulta);

		}		

		public function detallemesa($idmesa){

			$consulta="SELECT * FROM mesa WHERE idmesa='$idmesa'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;

		}

		public function editarmesa($idmesa,$numero,$capacidad,$estado){

			$consulta="UPDATE mesa SET numero='$numero' , capacidad='$capacidad' , estado='$estado' WHERE idmesa='$idmesa'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;

		}

		public function habilitarmesa($idmesa){

			$consulta="UPDATE mesa SET estado=1 WHERE idmesa='$idmesa'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;

		}

		public function deshabilitarmesa($idmesa){

			$consulta="UPDATE mesa SET estado=0 WHERE idmesa='$idmesa'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;

		}
	}
 ?>