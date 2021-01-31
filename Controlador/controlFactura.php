<?php 
	include_once("../Modelo/EntidadFactura.php");
	class controlFactura{

		public function listarFactura(){

		}
		public function agregarFacturaC($idcomanda,$ruc){

			$objFactura=new EntidadFactura();
			$respuesta =$objFactura ->agregarFacturaC($idcomanda,$ruc);
		}
		public function agregarFacturaP($idproforma){
			
			$objBoletas = new EntidadFactura();
			$respuesta =$objBoletas ->agregarFacturaP($idproforma);
		}
	}
 ?>