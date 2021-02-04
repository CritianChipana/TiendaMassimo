<?php

// VerificarbotonGeneratReportedeVentas


if(isset($_POST['p-7']) || isset($_POST['dni'])){
    $dni = $_POST['dni'];
    include_once("../Vista/formGenerarReportedeVentas.php");
    include_once("../Modelo/EdetalleUsuario.php");
    $privilegios = new EdetalleUsuario;
    $listaprivilegios = $privilegios->obtenerPrivilegios($dni);
    $objGRV = new formGenerarReportedeVentas;
    $objGRV->MostrarformReportedeVentasShow($listaprivilegios);
   
}else{
    
    include_once("../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
    
}
// .
?>

