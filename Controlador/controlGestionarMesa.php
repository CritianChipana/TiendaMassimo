<?php
	include_once("../Modelo/EntidadMesa.php"); 
	class controlGestionarMesa{

		public function listarmesa(){

			$objLista=new EntidadMesa;
			$respuesta=$objLista->listarmesa();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
		}

		public function detallemesa($idmesa){

			$objDetalle=new EntidadMesa;
			$respuesta=$objDetalle->detallemesa($idmesa);
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
			return $data;
		}

		public function editarmesa($idmesa,$numero,$capacidad,$estado){

			$objMenu=new EntidadMesa;
			$respuesta=$objMenu->editarmesa($idmesa,$numero,$capacidad,$estado);
		}

		public function deshabilitarmesa($idmesa){

			$objMenu=new EntidadMesa;
			$respuesta=$objMenu->deshabilitarmesa($idmesa);

		}

		public function habilitarmesa($idmesa){

			$objMenu=new EntidadMesa;
			$respuesta=$objMenu->habilitarmesa($idmesa);
		}

		public function agregarmesa($numero,$capacidad,$estado){

			$producto= new EntidadMesa;
			$agregarproducto=$producto->agregarmesa($numero,$capacidad,$estado);
		}
	}
 ?>