<?php 
		include_once("../Modelo/EntidadComanda.php");
		include_once("../Modelo/EntidadProforma.php");
	class controlGenerarComprobante{

		public function listarComanda()
		{ 
            $objComanda = new EntidadComanda();
            $respuesta = $objComanda->listarComanda();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
		}
		public function detalleComandaID($idcomanda)
		{
			$objDComanda=new EntidadComanda();
			$fila=$objDComanda->detalleComandaID($idcomanda);
			return $fila;
		}
		public function listarProforma()
		{
            $objProforma = new EntidadProforma();
            $respuesta = $objProforma->listarProforma();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
		}
		public function detalleProformaID($idproforma)
		{
			$objDProforma=new EntidadProforma();
			$fila=$objDProforma->detalleProformaID($idproforma);
			return $fila;
		}
	}
 ?>