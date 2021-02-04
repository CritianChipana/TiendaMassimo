<?php
	if (isset($_POST['idbtn'])) 
	{
		if (isset($_POST['fom1'])) {
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("../Vista/formGenerarComprobante.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new formGenerarComprobante();
			$objComprobante->formGenerarComprobanteShow($listaPrivilegios);
		}
		else if(isset($_POST['btnc'])){
			$btnc="btnc";
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formListadoComandas.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();	
			$objListarComandas=new formListadoComandas();			
			if (isset($_POST['idcomanda'])) {
			$idcomanda=$_POST['idcomanda'];
			$buscarComandaID=$objComprobante->detalleComandaID($idcomanda);
				if (is_array($buscarComandaID)) {
				$objListarComandas->formListadoComandasShow($buscarComandaID,$listaPrivilegios);		
				}
				else{
					include_once("../shared/formMensajeSistema.php");
					$objMensaje = new formMensajeSistema;
					$objMensaje -> formMensajeSistemaShow("NO SE ENCONTRARON COINCIDENCIAS","../Controlador/controlVerificarAccesoComprobante.php",$listaPrivilegios,$btnc,"");
				}
			
			}
			else{
			$listaComandas=$objComprobante->listarComanda();
			$objListarComandas->formListadoComandasShow($listaComandas,$listaPrivilegios);
			}
		}
		else if(isset($_POST['btnp'])){
			$btnp="btnp";
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formListadoProformas.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$objListarProformas=new formListadoProformas();	
				if (isset($_POST['idproforma'])) {
				$idproforma=$_POST['idproforma'];
				$buscarProformaID=$objComprobante->detalleProformaID($idproforma);
					if(is_array($buscarProformaID)){
					$objListarProformas->formListadoProformasShow($buscarProformaID,$listaPrivilegios);	
					}
					else{
						include_once("../shared/formMensajeSistema.php");
						$objMensaje = new formMensajeSistema;
						$objMensaje -> formMensajeComrprobanteShow("NO SE ENCONTRARON COINCIDENCIAS","../Controlador/controlVerificarAccesoComprobante.php",$listaPrivilegios,$btnp,"");
					}
				}
				else
				{
				$listaProformas=$objComprobante->listarProforma();
				$objListarProformas->formListadoProformasShow($listaProformas,$listaPrivilegios);
				}
		}
		else if(isset($_POST['btncb'])){
			$btnTC=$_POST['btncb'];
			$dni=$_POST['dni'];
			$idcomanda=$_POST['idcomanda'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formDetalleComanda.php");
  			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$detalleComandaID=$objComprobante->detalleComandaID($idcomanda);
			$objDetalleComanda=new formDetalleComanda();
			$objDetalleComanda->formDetalleComandaShow($detalleComandaID,$listaPrivilegios,$btnTC);
		}
		else if(isset($_POST['btncf'])){
			$btnTC=$_POST['btncf'];
			$dni=$_POST['dni'];
			$idcomanda=$_POST['idcomanda'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formDetalleComanda.php");		
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$detalleComandaID=$objComprobante->detalleComandaID($idcomanda);
			$objDetalleComanda=new formDetalleComanda();
			$objDetalleComanda->formDetalleComandaShow($detalleComandaID,$listaPrivilegios,$btnTC);
		}
		else if(isset($_POST['btnpb'])){
			$btnTP=$_POST['btnpb'];
			$dni=$_POST['dni'];
			$idproforma=$_POST['idproforma'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formDetalleProforma.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$detalleProformaID=$objComprobante->detalleProformaID($idproforma);
			$objDetalleProforma=new formDetalleProforma();
			$objDetalleProforma->formDetalleProformaShow($detalleProformaID,$listaPrivilegios,$btnTP);
		}
		else if(isset($_POST['btnpf'])){
			$btnTP=$_POST['btnpf'];
			$dni=$_POST['dni'];
			$idproforma=$_POST['idproforma'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			include_once("../Vista/formDetalleProforma.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante();
			$detalleProformaID=$objComprobante->detalleProformaID($idproforma);
			$objDetalleProforma=new formDetalleProforma();
			$objDetalleProforma->formDetalleProformaShow($detalleProformaID,$listaPrivilegios,$btnTP);
		}
			
		else if(isset($_POST['btnCO'])){
			$btnCO="btnCO";
			$dni=$_POST['dni'];
				if (isset($_POST['idcomanda'])) {
				$idcomanda=$_POST['idcomanda'];
				include_once("../Modelo/EdetalleUsuario.php");
				include_once("../Vista/formNotificarComprobante.php");
				$objDetalle = new EdetalleUsuario;
				$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
					if (isset($_POST['btnCOB'])) {
						include_once("controlBoleta.php");
						$objBoleta=new controlBoleta();
						$objAgregar=$objBoleta->agregarBoletaC($idcomanda);
						$objConfirmacion=new formNotificarComprobante();
						$objConfirmacion->formNotificarComprobanteShow($listaPrivilegios);				
					}
					else if(isset($_POST['btnCOF'])){
						$ruc=$_POST['ruc'];
							if (strlen($ruc)==11) {
							include_once("controlFactura.php");
							$objFactura=new controlFactura();
							$objAgregar=$objFactura->agregarFacturaC($idcomanda,$ruc);	
							$objConfirmacion=new formNotificarComprobante();
							$objConfirmacion->formNotificarComprobanteShow($listaPrivilegios);	
							}
							else{
								include_once("../shared/formMensajeSistema.php");
								$btnCO="btnc";
								$objMensaje = new formMensajeSistema;
								$objMensaje -> formMensajeSistemaShow("EL RUC DEBE CONTENER 11 DIGITOS","../Controlador/controlVerificarAccesoComprobante.php",$listaPrivilegios,$btnCO,"");
							}
					}
				}
				else if(isset($_POST['idproforma'])){
				$idproforma=$_POST['idproforma'];
				include_once("../Modelo/EdetalleUsuario.php");
				include_once("../Vista/formNotificarComprobante.php");
				$objDetalle = new EdetalleUsuario;
				$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
				if (isset($_POST['btnPRB'])) {
					include_once("controlBoleta.php");
					$objBoleta=new controlBoleta();
					$objBoleta->agregarBoletaP($idproforma);
				}
				else if(isset($_POST['btnPRF']))
				{
					include_once("controlFactura.php");
					$objFactura=new controlFactura();
					$objFactura->agregarFacturaP($idproforma);
				}
				$objConfirmacion=new formNotificarComprobante();
				$objConfirmacion->formNotificarComprobanteShow($listaPrivilegios);
				}
		}
		else if(isset($_POST['btndb'])){
			$btnGR=$_POST['btndb'];
			$dni=$_POST['dni'];
			$idboleta=$_POST['idboleta'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante($idproforma);
			$objComprobante->detalleProformaID();
		}
		else if(isset($_POST['btndf'])){
			$btnGR=$_POST['btndf'];
			$dni=$_POST['dni'];
			$idproforma=$_POST['idproforma'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGenerarComprobante.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objComprobante= new controlGenerarComprobante($idcomanda);
			$objComprobante->detalleProformaID();
		}
		else if(isset($_POST['btnlp'])){
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("../Vista/formGestionarProducto.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);

		}
		else if(isset($_POST['btnap'])){
			
		}
		else if(isset($_POST['btnep'])){
			
		}				


		// else if(isset($_POST['btndb'])){
		// 	$btnGR=$_POST['btndb'];
		// 	$dni=$_POST['dni'];
		// 	$idboleta=$_POST['idboleta'];
		// 	include_once("../Modelo/EdetalleUsuario.php");
		// 	include_once("controlGenerarComprobante.php");
		// 	$objDetalle = new EdetalleUsuario;
		// 	$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
		// 	$objComprobante= new controlGenerarComprobante($idproforma);
		// 	// $objComprobante->detalleProformaID();
		// }
		// else if(isset($_POST['btndf'])){
		// 	$btnGR=$_POST['btndf'];
		// 	$dni=$_POST['dni'];
		// 	$idproforma=$_POST['idproforma'];
		// 	include_once("../Modelo/EdetalleUsuario.php");
		// 	include_once("controlGenerarComprobante.php");
		// 	$objDetalle = new EdetalleUsuario;
		// 	$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
		// 	$objComprobante= new controlGenerarComprobante($idcomanda);
		// 	// $objComprobante->detalleProformaID();
		// }		
	}

else
{
	include_once("../shared/formMensajeSistema.php");
	$objMensaje = new formMensajeSistema;
	$objMensaje -> formMensajeSistemaShow("ACCESO DENEGADO NO SE HA INICIADO SESION","../index.php","","","","");
}

 ?>