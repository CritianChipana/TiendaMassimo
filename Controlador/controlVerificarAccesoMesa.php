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
			$btneditar=$_POST['btneditar'];
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
			$btneditar="btneditar";
			$btnconfirmaredit=$_POST['btnconfirmaredit'];
			$dni=$_POST['dni'];
			$idmesa1='idmesa';
			$idmesa=$_POST['idmesa'];
			$capacidad=$_POST['capacidad'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMesa.php");
			include_once("../Vista/formGestionarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			if ($capacidad<=1 || $capacidad>6) {
				include_once("../shared/formMensajeSistema.php");
				$objMensaje = new formMensajeSistema;
				$objMsj=$objMensaje->formMensajeSistemaShow("SOLO SE PERMITE UNA CAPACIDAD ENTRE 2-6 PERSONAS","../Controlador/controlVerificarAccesoMesa.php",$listaPrivilegios,$btneditar,$idmesa1,$idmesa);
			}
			else{
			$objMenu=new controlGestionarMesa;
			$objEditar=$objMenu->editarmesa($idmesa,$capacidad);
			$objMenu2=new controlGestionarMesa;
			$objMenus=$objMenu2->listarmesa();
			$objVista=new formGestionarMesa;
			$objVistaM=$objVista->formGestionarMesaShow($objMenus,$listaPrivilegios);				
			}
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
			include_once("../Vista/formAgregarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objVista=new formAgregarMesa;
			$objForm=$objVista->formAgregarMesaShow(NULL,$listaPrivilegios);
		}
		else if(isset($_POST['btnagregarmesa'])){
			$btnaddmesa='btnaddmesa';
			$dni=$_POST['dni'];
			$capacidad=$_POST['capacidad'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMesa.php");
			include_once("../Vista/formGestionarMesa.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			if ($capacidad<=1 || $capacidad>6) {
				include_once("../shared/formMensajeSistema.php");
				$objMensaje = new formMensajeSistema;
				$objMsj=$objMensaje->formMensajeSistemaShow("SOLO SE PERMITE UNA CAPACIDAD ENTRE 2-6 PERSONAS","../Controlador/controlVerificarAccesoMesa.php",$listaPrivilegios,$btnaddmesa,NULL,NULL);
			}
			else{
			$objMenu=new controlGestionarMesa;
			$objADD=$objMenu->agregarmesa($capacidad);
			$objMenu2=new controlGestionarMesa;
			$objMenus=$objMenu2->listarmesa();
			$objVista=new formGestionarMesa;
			$objVistaM=$objVista->formGestionarMesaShow($objMenus,$listaPrivilegios);				
			}
		}
		else{
			include_once("../shared/formMensajeSistema.php");
			$objMensaje = new formMensajeSistema;
			$objMensaje -> formMensajeSistemaShow("ACCESO DENEGADO NO SE HA INICIADO SESION","../index.php","","","","");
		}
	}
else
{
	include_once("../shared/formMensajeSistema.php");
	$objMensaje = new formMensajeSistema;
	$objMensaje -> formMensajeSistemaShow("ACCESO DENEGADO NO SE HA INICIADO SESION","../index.php","","","","");
}
 ?>