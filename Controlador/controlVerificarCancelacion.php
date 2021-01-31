<?php
if(isset($_POST['botoncancelarpedido'])){

    $botoncancelar = $_POST['botoncancelarpedido'];
    
    $codigo = $_POST['codigo'];
    $tipo = $_POST['tipo'];
    $dni = $_POST['dni'];
    if(isset($botoncancelar) ){
        include_once("../Vista/formMensajeCancelar.php");
        include_once("../Modelo/EdetalleUsuario.php");
        $obj = new EdetalleUsuario;
        $listaPrivilegios =$obj-> obtenerPrivilegios($dni);
        $objetoCancelar = new formMensajeCancelar;
        $objetoCancelar->mensajecancelar($codigo,$tipo,$listaPrivilegios);
        // echo $codigo. " ".$tipo;
      
    
    }else{
        include_once("../shared/formMensajeSistema.php");
        
        $objetoMensaje = new formMensajeSistema;
        $objetoMensaje -> formMensajeSistemaShow2("ACCESO NO PERMITIDO","<a href='../index.php'>Iniciar Session</a>");
    
    }
    

}


?>