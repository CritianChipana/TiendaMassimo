|<?php
    $idbtn=(isset($_GET['idbtn'])) ? $_GET['idbtn'] : '';
    if(is_numeric($idbtn)){
    $DNI = $_POST['dni'];
    $apellido = $_POST['apellido'];
    include_once("formGenerarComanda.php");
    include_once("../../model/modeloGenerarComanda/EntidadProducto.php");
    $objetoEntidad = new EntidadProducto;
    $objetoComanda = new formGenerarComanda($DNI,$apellido);
    $lista = $objetoEntidad->listar_producto();
    $objetoComanda ->formGenerarComandaShow($lista);
//prueba numero 2
    // segundo  modificar
    }else{
        include_once("../../shared/formMensajeSistema.php");
        $objetoMensaje = new formMensajeSistema;
        $objetoMensaje -> formMensajeSistemaShow("Acceso Incorrecto","<a href='../../index.php'>Ingresar Usuario</a>");
        
    }

?>