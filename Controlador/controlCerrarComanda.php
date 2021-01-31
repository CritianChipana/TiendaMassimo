<?php

if(isset($_POST['a'])){
    $dni = $_POST['dni'];
    include_once("../Vista/formBienvenida.php");
    include_once("../Modelo/EdetalleUsuario.php");
    $objetoEntidad = new EdetalleUsuario;
    $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
    $objetoB= new formBienvenida();
    $objetoB ->formBienvenidaShow($listaprivilegios);

}else{
    include_once("../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
    
}

?>