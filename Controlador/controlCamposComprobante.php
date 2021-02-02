<?php


if(isset( $_POST['botonbuscarcomprobante'])){
    $dni = $_POST['dni'];
    $codigo = $_POST['codigo'];
    $tipo = $_POST['tipo'];

    if($codigo =="" || $tipo=="seleccione"){
        echo    "<script>
                 alert('Llene correctamente los Datos');
                 </script>";

        include_once("../Vista/formBuscarComprobante.php");
        // include_once("../Modelo/EntidadProducto.php");
        include_once("../Modelo/EdetalleUsuario.php");
        $objetoEntidad = new EdetalleUsuario;
        $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
        // $objetoEntidad = new EntidadProducto;
        $objetobuscar = new formBuscarComprobante;
        // $listaproductos = $objetoEntidad->listar_producto();
        $objetobuscar -> formBuscarComprobanteShow($listaprivilegios);
        
    }else{
        include_once("controlGenerarComprobanteDevolucion.php");
        $objetoControlBD = new controlGenerarComprobanteDevolucion();
        $objetoControlBD-> verificarCampos($codigo,$tipo,$dni);
    }
    
    
}else{
    include_once("../shared/formMensajeSistema.php");
    
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("ACCESO NO PERMITIDO","<a href='../index.php'>Iniciar Session</a>");

}


?>
