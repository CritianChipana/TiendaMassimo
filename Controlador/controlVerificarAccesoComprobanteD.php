<?php

// control verificar Acceso


if(isset($_POST['dni'])){
    $dni =$_POST['dni'];
    
  
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
    
    include_once("../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
    
}

?>

