<?php

	if (isset($_POST['idbtn'])) {
		
		if (isset($_POST['fom1'])) {
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMesa.php");
			include_once("../Vista/formGestionarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMesa;
			$objMenus=$objMenu->listarmesa();
			$objVista= new formGestionarMesa;
			$objVistaM=$objVista->formGestionarMesaShow($objMenus,$listaPrivilegios);
		}

		else if(isset($_POST['btneditar'])){
			$dni=$_POST['dni'];
			$idmesa=$_POST['idmesa'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMesa.php");
			include_once("../Vista/formEditarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMesa;
			$objDetalle=$objMenu->detallemesa($idmesa);
			$objVista=new formEditarMesa;
			$objForm=$objVista->formEditarMesaShow($objDetalle,$listaPrivilegios);

		}
		else if(isset($_POST['btnconfirmaredit'])){
			$dni=$_POST['dni'];
			$idmesa=$_POST['idmesa'];
			$numero=$_POST['numero'];
			$capacidad=$_POST['capacidad'];
			$estado=$_POST['estado'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMesa.php");
			include_once("../Vista/formGestionarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMesa;
			$objEditar=$objMenu->editarmesa($idmesa,$numero,$capacidad,$estado);
			$objMenu2=new controlGestionarMesa;
			$objMenus=$objMenu2->listarmesa();
			$objVista=new formGestionarMesa;
			$objVistaM=$objVista->formGestionarMesaShow($objMenus,$listaPrivilegios);

		}
		else if(isset($_POST['btnhabilitar'])){
			$dni=$_POST['dni'];
			$idmesa=$_POST['idmesa'];			
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMesa.php");
			include_once("../Vista/formGestionarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMesa;
			$objUpdate=$objMenu->habilitarmesa($idmesa);
			$objMenu2=new controlGestionarMesa;
			$objMenus=$objMenu2->listarmesa();
			$objVista=new formGestionarMesa;
			$objVistaM=$objVista->formGestionarMesaShow($objMenus,$listaPrivilegios);	

		}
		else if(isset($_POST['btndeshabilitar'])){
			$dni=$_POST['dni'];
			$idmesa=$_POST['idmesa'];	
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMesa.php");
			include_once("../Vista/formGestionarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMesa;
			$objUpdate=$objMenu->deshabilitarmesa($idmesa);
			$objMenu2=new controlGestionarMesa;
			$objMenus=$objMenu2->listarmesa();
			$objVista=new formGestionarMesa;
			$objVistaM=$objVista->formGestionarMesaShow($objMenus,$listaPrivilegios);	
		}
		else if(isset($_POST['btnaddmesa'])){
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMesa.php");
			include_once("../Vista/formEditarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objVista=new formEditarMesa;
			$objForm=$objVista->formEditarMesaShow(NULL,$listaPrivilegios);
		}
		else if(isset($_POST['btnagregarmesa'])){
			$dni=$_POST['dni'];
			$numero=$_POST['numero'];
			$capacidad=$_POST['capacidad'];
			$estado=$_POST['estado'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMesa.php");
			include_once("../Vista/formGestionarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMesa;
			$objADD=$objMenu->agregarmesa($numero,$capacidad,$estado);
			$objMenu2=new controlGestionarMesa;
			$objMenus=$objMenu2->listarmesa();
			$objVista=new formGestionarMesa;
			$objVistaM=$objVista->formGestionarMesaShow($objMenus,$listaPrivilegios);
		}
	}

	else
	{
		include_once("../shared/formMensajeSistema.php");
		$objMensaje = new formMensajeSistema;
		$objMensaje -> formMensajeSistemaShow("ACCESO DENEGADO NO SE HA INICIADO SESION","../index.php","","","","");
	}
 ?>