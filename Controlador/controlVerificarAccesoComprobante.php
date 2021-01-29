<?php 
	$idbtn=(isset($_POST['idbtn'])) ? $_POST['idbtn'] : '';
	$dni=(isset($_POST['dni'])) ? $_POST['dni'] : '';
	$fom1=(isset($_POST['fom1'])) ? $_POST['fom1'] : '';
	$btnc=(isset($_POST['btnc'])) ? $_POST['btnc'] : '';
	$btnp=(isset($_POST['btnp'])) ? $_POST['btnp'] : '';
	
	echo $idbtn;
	echo $dni;
	echo $fom1;
	echo $btnc;
	echo $btnp;
	
	if (is_numeric($idbtn)) {

		if (is_numeric($fom1)) {
			include_once("../Modelo/EdetalleUsuario.php");		
			include_once("../Vista/formGenerarComprobante.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new formGenerarComprobante();
			$objComprobante->formGenerarComprobanteShow($listaPrivilegios);
			//include_once("controlGenerarComprobante.php");
		}
		else if(is_string($btnc)){
			
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formListadoComandas.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$listaComandas=$objComprobante->listarComanda();
			$objListarComandas=new formListadoComandas();
			$objListarComandas->formListadoComandasShow($listaComandas,$listaPrivilegios);
		}
	}
	else
	{
		echo "ACCESO DENEGADO";
	}

 ?>