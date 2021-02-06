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

		public function editarmesa($idmesa,$capacidad){

			$objMenu=new EntidadMesa;
			$respuesta=$objMenu->editarmesa($idmesa,$capacidad);
		}

		public function deshabilitarmesa($idmesa){

			$objMenu=new EntidadMesa;
			$respuesta=$objMenu->deshabilitarmesa($idmesa);

		}

		public function habilitarmesa($idmesa){

			$objMenu=new EntidadMesa;
			$respuesta=$objMenu->habilitarmesa($idmesa);
		}

		public function agregarmesa($capacidad){

			$producto= new EntidadMesa;
			$agregarproducto=$producto->agregarmesa($capacidad);
		}
	}
 ?>