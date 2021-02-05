<?php

	if (isset($_POST['idbtn'])) {
		
		if (isset($_POST['fom1'])) {
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMenu.php");
			include_once("../Vista/formGestionarMenu.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMenu;
			$objMenus=$objMenu->listarmenu();
			$objVista= new formGestionarMenu;
			$objVistaM=$objVista->formGestionarMenuShow($objMenus,$listaPrivilegios);
		}

		else if(isset($_POST['btneditar'])){
			$dni=$_POST['dni'];
			$idproducto=$_POST['idproducto'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMenu.php");
			include_once("../Vista/formEditarMenu.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMenu;
			$objDetalle=$objMenu->detallemenu($idproducto);
			$objVista=new formEditarMenu;
			$objForm=$objVista->formEditarMenuShow($objDetalle,$listaPrivilegios);

		}
		else if(isset($_POST['btnconfirmaredit'])){
			$dni=$_POST['dni'];
			$idproducto=$_POST['idproducto'];
			$nombrepr=$_POST['nombrepr'];
			$descripcion=$_POST['descripcion'];
			$precio=$_POST['precio'];
			$estado=$_POST['estado'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMenu.php");
			include_once("../Vista/formGestionarMenu.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMenu;
			$objEditar=$objMenu->editarmenu($idproducto,$nombrepr,$descripcion,$precio,$estado);
			$objMenu2=new controlGestionarMenu;
			$objMenus=$objMenu2->listarmenu();
			$objVista=new formGestionarMenu;
			$objVistaM=$objVista->formGestionarMenuShow($objMenus,$listaPrivilegios);

		}
		else if(isset($_POST['btnhabilitar'])){
			$dni=$_POST['dni'];
			$idproducto=$_POST['idproducto'];			
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMenu.php");
			include_once("../Vista/formGestionarMenu.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMenu;
			$objUpdate=$objMenu->habilitarmenu($idproducto);
			$objMenu2=new controlGestionarMenu;
			$objMenus=$objMenu2->listarmenu();
			$objVista=new formGestionarMenu;
			$objVistaM=$objVista->formGestionarMenuShow($objMenus,$listaPrivilegios);	

		}
		else if(isset($_POST['btndeshabilitar'])){
			$dni=$_POST['dni'];
			$idproducto=$_POST['idproducto'];	
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMenu.php");
			include_once("../Vista/formGestionarMenu.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMenu;
			$objUpdate=$objMenu->deshabilitarmenu($idproducto);
			$objMenu2=new controlGestionarMenu;
			$objMenus=$objMenu2->listarmenu();
			$objVista=new formGestionarMenu;
			$objVistaM=$objVista->formGestionarMenuShow($objMenus,$listaPrivilegios);	
		}
		else if(isset($_POST['btnaddmenu'])){
			$dni=$_POST['dni'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMenu.php");
			include_once("../Vista/formAgregarMenu.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objVista=new formAgregarMenu;
			$objForm=$objVista->formAgregarMenuShow(NULL,$listaPrivilegios);
		}		
		else if(isset($_POST['btnagregarmenu'])){
			$dni=$_POST['dni'];
			$nombrepr=$_POST['nombrepr'];
			$descripcion=$_POST['descripcion'];
			$precio=$_POST['precio'];
			$estado=$_POST['estado'];
			include_once("../Modelo/EdetalleUsuario.php");
			include_once("controlGestionarMenu.php");
			include_once("../Vista/formGestionarMenu.php");
			$objDetalle = new EdetalleUsuario;
			$listaPrivilegios = $objDetalle -> obtenerPrivilegios($dni);
			$objMenu=new controlGestionarMenu;
			$objADD=$objMenu->agregarmenu($nombrepr,$descripcion,$precio,$estado);
			$objMenu2=new controlGestionarMenu;
			$objMenus=$objMenu2->listarmenu();
			$objVista=new formGestionarMenu;
			$objVistaM=$objVista->formGestionarMenuShow($objMenus,$listaPrivilegios);
		}
	}

	else
{
	include_once("../shared/formMensajeSistema.php");
	$objMensaje = new formMensajeSistema;
	$objMensaje -> formMensajeSistemaShow("ACCESO DENEGADO NO SE HA INICIADO SESION","../index.php","","","","");
}
 ?>