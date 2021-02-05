<?php 
	include_once("../Modelo/EntidadMenu.php");
	class controlGestionarMenu{

		public function listarmenu(){

			$objLista=new EntidadMenu;
			$respuesta=$objLista->listarmenu();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;

		}
		public function detallemenu($idmenu){

			$objDetalle=new EntidadMenu;
			$respuesta=$objDetalle->detallemenu($idmenu);
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
		public function editarmenu($idmenu,$nombre,$descripcion,$precio,$estado){

			$objMenu=new EntidadMenu;
			$respuesta=$objMenu->editarmenu($idmenu,$nombre,$descripcion,$precio,$estado);
		}
		public function deshabilitarmenu($idmenu){

			$objMenu=new EntidadMenu;
			$respuesta=$objMenu->deshabilitarmenu($idmenu);

		}
		public function habilitarmenu($idmenu){

			$objMenu=new EntidadMenu;
			$respuesta=$objMenu->habilitarmenu($idmenu);
		}
		public function agregarmenu($nombre,$descripcion,$precio,$estado){

			$producto= new EntidadMenu;
			$agregarproducto=$producto->agregarmenu($nombre,$descripcion,$precio,$estado);
		}
	}
 ?>