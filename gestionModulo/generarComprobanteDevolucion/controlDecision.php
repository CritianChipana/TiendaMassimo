<?php
if(isset($_POST)){
    
    if(isset($_POST['si'])){
        
        $codigo = $_POST['codigo2'];
        $tipo = $_POST['tipo'];
        include_once('../model/EntidadCancelarPedido.php');
        $objetoCancelar = new EntidadCancelarPedido;
        
        $r2=$objetoCancelar -> CancelarPedido($codigo, $tipo);

        if($r2==NULL){
            echo     "<script>
            alert('No se pudo modificar el Comprobante');
            </script>";
        }else{
            include_once("formComprobanteDevolucion.php");
            include_once("../model/EntidadBuscarComprobante.php");
            $objetobuscarcomprobante = new EntidadBuscarComprobante;
            $objetoComprobante = new formComprobanteDevolucion;
            $r = $objetobuscarcomprobante->validadComprobante($codigo,$tipo);
            $objetoComprobante -> formComprobanteDevolucionShow($r);
        }


    }

    if(isset($_POST['no'])){
        include_once("formBuscarComprobante.php");
        $objetoBuscar = new formBuscarComprobante;
        $objetoBuscar -> formBuscarComprobanteShow();
    }

}else{
    include_once("../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
    
}

?>