<?php 
	include_once("../Controlador/conexion.php");
	class EntidadMenu extends conexion{

		public function listarmenu(){

			$consulta="SELECT * FROM producto";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;
		}

		public function detallemenu($idmenu){

			$consulta="SELECT * FROM producto WHERE idproducto='$idmenu'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;

		}

		public function editarmenu($idmenu,$nombre,$descripcion,$precio,$estado){

			$consulta="UPDATE producto SET nombrepr='$nombre' , descripcion='$descripcion' , precio='$precio',estado='$estado' WHERE idproducto='$idmenu'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;

		}

		public function deshabilitarmenu($idmenu){

			$consulta="UPDATE producto SET estado=0 WHERE idproducto='$idmenu'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;
			
		}

		public function habilitarmenu($idmenu){

			$consulta="UPDATE producto SET estado=1 WHERE idproducto='$idmenu'";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;
			
		}

		public function agregarmenu($nombre,$descripcion,$precio,$estado){

			$consulta="INSERT INTO producto (nombrepr,descripcion,precio,estado) VALUES ('$nombre','$descripcion',$precio,$estado)";
			$resultado=mysqli_query($this->conectar(),$consulta);
			return $resultado;
		}
	}
 ?>