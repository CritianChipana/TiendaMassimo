
<?php
    if(isset($_POST['dni'])){
    $dni = $_POST['dni'];
 
        
    include_once("../Vista/formGenerarComanda.php");
    include_once("../Modelo/EntidadProducto.php");
    include_once("../Modelo/EdetalleUsuario.php");
    $objetoEntidad = new EdetalleUsuario;
    $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
    $objetoEntidad = new EntidadProducto;
    $objetoComanda = new formGenerarComanda();
    $listaproductos = $objetoEntidad->listar_producto();
    $objetoComanda ->formGenerarComandaShow($listaprivilegios,$listaproductos);

    }else{
     
        include_once("../shared/formMensajeSistema.php");
        $objetoMensaje = new formMensajeSistema;
        $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
        
    }
// .
?>