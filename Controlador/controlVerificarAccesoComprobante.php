<?php 
	$idbtn=(isset($_GET['idbtn'])) ? $_GET['idbtn'] : '';
	$opc=(isset($_GET['opc'])) ? $_GET['opc'] : '';
	$opp=(isset($_GET['opp'])) ? $_GET['opp'] : '';
	$dni=(isset($_GET['dni'])) ? $_GET['dni'] : '';
	if (is_numeric($idbtn)) {
		include_once("../Modelo/EdetalleUsuario.php");		
		include_once("../Vista/formGenerarComprobante.php");
		$objDetalle = new EdetalleUsuario();
		$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
		$objComprobante= new formGenerarComprobante();
		$objComprobante->formGenerarComprobanteShow($listaPrivilegios);
		//include_once("controlGenerarComprobante.php");
	}
	else if(is_numeric($opc)){
		include_once("../Modelo/EdetalleUsuario.php");
		include_once("controlGenerarComprobante.php");
		include_once("../Vista/formListadoComandas.php");
		$objDetalle = new EdetalleUsuario();
		$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
		$objComprobante= new controlGenerarComprobante();
		$objComprobante->listarComanda();
		$objListarComandas=new formListadoComandas();
		$objListarComandas->formListadoComandasShow($objComprobante,$listaPrivilegios);

	}
 ?>