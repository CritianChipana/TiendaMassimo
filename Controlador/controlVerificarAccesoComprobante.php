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
			$objListarComandas->formListadoComandasShow($buscarComandaID,$listaPrivilegios);
			}
			else{
			$listaComandas=$objComprobante->listarComanda();
			$objListarComandas->formListadoComandasShow($listaComandas,$listaPrivilegios);
			}
		}
		else if(isset($_POST['btnp'])){
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
			$objListarProformas->formListadoProformasShow($buscarProformaID,$listaPrivilegios);
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
			}
			else if(isset($_POST['btnCOF'])){
			$ruc=$_POST['ruc'];
				include_once("controlFactura.php");
				$objFactura=new controlFactura();
				$objAgregar=$objFactura->agregarFacturaC($idcomanda,$ruc);
			}
			$objConfirmacion=new formNotificarComprobante();
			$objConfirmacion->formNotificarComprobanteShow($listaPrivilegios);
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
	}
	else
	{
		echo "ACCESO DENEGADO";
	}

 ?>