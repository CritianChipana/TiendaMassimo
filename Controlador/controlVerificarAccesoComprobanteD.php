<?php

// control verificar Acceso


if(isset($_POST['botonGenerarComprobanteDevolucion'])){
    
    include_once("formBuscarComprobante.php");
    $objetobuscar = new formBuscarComprobante;
    $objetobuscar -> formBuscarComprobanteShow();
}else{
    
    include_once("../../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
    
}

?>

