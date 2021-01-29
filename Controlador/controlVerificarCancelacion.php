<?php
if(isset($_POST['botoncancelarpedido'])){

    $botoncancelar = $_POST['botoncancelarpedido'];
    
    $codigo = $_POST['codigo'];
    $tipo = $_POST['tipo'];
    if(isset($botoncancelar) ){
        include_once("formMensajeCancelar.php");
        $objetoCancelar = new formMensajeCancelar;
        $objetoCancelar->mensajecancelar($codigo,$tipo);
        // echo $codigo. " ".$tipo;
      
    
    }else{
        include_once("../../shared/formMensajeSistema.php");
        
        $objetoMensaje = new formMensajeSistema;
        $objetoMensaje -> formMensajeSistemaShow("ACCESO NO PERMITIDO","<a href='../index.php'>Iniciar Session</a>");
    
    }
    

}


?>