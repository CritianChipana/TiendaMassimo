<?php

if(isset($_POST['a'])){
    
}else{
    include_once("../../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow("Acceso Incorrecto","<a href='../../index.php'>Ingresar Usuario</a>");
    
}

?>