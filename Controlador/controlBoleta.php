<?php 
	include_once("../Modelo/EntidadBoleta.php");
	class controlBoleta{

		public function listarBoleta(){

		}
		public function agregarBoletaC($idcomanda){
			$objBoletas = new EntidadBoleta();
			$respuesta =$objBoletas ->agregarBoletaC($idcomanda);
		}
		public function agregarBoletaP($idproforma){
			$objBoletas = new EntidadBoleta();
			$respuesta =$objBoletas ->agregarBoletaP($idproforma);
		}
	}
 ?>