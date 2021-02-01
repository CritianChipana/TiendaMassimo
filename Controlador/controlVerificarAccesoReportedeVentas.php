<?php

// VerificarbotonGeneratReportedeVentas


if(isset($_POST['p-7'])){

    include_once("../Vista/formGenerarReportedeVentas.php");
    $objGRV = new formGenerarReportedeVentas;
    $objGRV->MostrarformReportedeVentasShow();
   
}else{
    
    include_once("../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
    
}

?>

