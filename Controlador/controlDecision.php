<?php
if(isset($_POST)){
    
    if(isset($_POST['si'])){
        
        $codigo = $_POST['codigo2'];
        $tipo = $_POST['tipo'];
        $dni1 = $_POST['dni'];
        // include_once('../Model/EntidadCancelarPedido.php');
        include_once("../Modelo/EntidadCancelarPedido.php");
        $objetoCancelar = new EntidadCancelarPedido;
        
        $r2=$objetoCancelar -> CancelarPedido($codigo, $tipo);

        if($r2==NULL){
            echo     "<script>
            alert('No se pudo modificar el Comprobante');
            </script>";
            include_once("../Vista/formBuscarComprobante.php");
            include_once("../Modelo/EdetalleUsuario.php");
            $objetoEntidad = new EdetalleUsuario;
            $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni1);
            $objetobuscar = new formBuscarComprobante;
            $objetobuscar -> formBuscarComprobanteShow($listaprivilegios);
        }else{
            // include_once("formComprobanteDevolucion.php");
            include_once("../Vista/formComprobanteDevolucion.php");
            // include_once("../model/EntidadBuscarComprobante.php");
            include_once("../Modelo/EntidadBuscarComprobante.php");
            include_once("../Modelo/EdetalleUsuario.php");
            $detalle = new EdetalleUsuario;
            $listaprivilegios = $detalle->obtenerPrivilegios($dni1);
            $objetobuscarcomprobante = new EntidadBuscarComprobante;
            $objetoComprobante = new formComprobanteDevolucion;
            $r = $objetobuscarcomprobante->validadComprobante($codigo,$tipo);
            $objetoComprobante -> formComprobanteDevolucionShow($r,$listaprivilegios,$tipo);
        }


    }

    if(isset($_POST['no'])){
        $dni =$_POST['dni'];
        include_once("../Vista/formBuscarComprobante.php");
        include_once("../Modelo/EdetalleUsuario.php");
        $objetoEntidad = new EdetalleUsuario;
        $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
        $objetobuscar = new formBuscarComprobante;
        $objetobuscar -> formBuscarComprobanteShow($listaprivilegios);
    }

}else{
    include_once("../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
    
}

?>