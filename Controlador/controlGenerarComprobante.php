<?php 
		include_once("../../model/modelGenerarComprobante/EntidadComanda.php");
		include_once("../../model/modelGenerarComprobante/EntidadProforma.php");
	class controlGenerarComprobante{

		public function listarComanda(){
            $objComanda = new EntidadComanda();
            $respuesta = $objComanda->listarComanda();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
		}

		public function detalleComandaID($idcomanda)
		{
		$objComanda=new Comanda();
		$fila=$objComanda->detalleComandaID($idcomanda);
		return $fila;
		}

		public function listarProforma()
		{
            $objComanda = new Proforma();
            $respuesta = $objComanda->listarProforma();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
		}
		
		public function detalleProformaID($idproforma)
		{
		$objComanda=new Proforma();
		$fila=$objComanda->detalleProformaID($idproforma);
		return $fila;
		}
	}
 ?>