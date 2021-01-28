<?php


if(isset( $_POST['botonbuscarcomprobante'])){

    $codigo = $_POST['codigo'];
    $tipo = $_POST['tipo'];

    if($codigo =="" || $tipo=="seleccione"){
        echo    "<script>
                 alert('Llene correctamente los Datos');
                 </script>";

        include_once("formBuscarComprobante.php");
        $objetoBuscar = new formBuscarComprobante;
        $objetoBuscar->formBuscarComprobanteShow();
        
    }else{
        include_once("controlGenerarComprobanteDevolucion.php");
        $objetoControlBD = new controlGenerarComprobanteDevolucion();
        $objetoControlBD-> verificarCampos($codigo,$tipo);
    }
    
    
}else{
    include_once("../../shared/formMensajeSistema.php");
    
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow("ACCESO NO PERMITIDO","<a href='../index.php'>Iniciar Session</a>");

}


?>
