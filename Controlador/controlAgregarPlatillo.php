<?php

 if(isset($_GET['dni'])){
     include_once("../Vista/formAgregarPlatillo.php");
     include_once("../Modelo/EntidadProducto.php");
     include_once("../Modelo/EdetalleUsuario.php");
     include_once("../Modelo/EntidadListarComanda.php");
     include_once("../Vista/formGenerarComanda.php");
     include_once("../Vista/formListarPedidos.php");
    //  include_once


    $dni = $_GET['dni']; 
    $idcomanda = $_GET['idcomanda'];
     if($_GET['b']==1){

         $objetoEntidad = new EdetalleUsuario;
         $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
         $objetoEntidad2 = new EntidadProducto;
         $objetoComanda = new formAgregarPlatillo();
         $listaproductos = $objetoEntidad2->listar_producto();
         $objetoComanda -> formSeleccionarPlatillo($listaprivilegios,$listaproductos,$idcomanda);
     }else if($_GET['b']==2){
        $opbjetocancelar  = new EntidadListarComanda;
        $opbjetocancelar ->Cancelar($idcomanda);
        echo    "<script>
        alert('Se Cancelo el pedido');
        </script>";
        $objetoEntidad = new EdetalleUsuario;
        $objetoC = new formGenerarComanda;
        $objetoEntidad2 = new EntidadProducto;
        $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
        $listaproductos = $objetoEntidad2->listar_producto();
        $objetoC -> formGenerarComandaShow($listaprivilegios,$listaproductos);
     }else if($_GET['b']==3){
         $objetoEntidad = new EdetalleUsuario;
         $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
         $pedido = new EntidadListarComanda;
         $listapedidos = $pedido ->ListarPedido($idcomanda);
         $verpedido = new formListarPedido;
         $verpedido -> formListarPedido2($listaprivilegios,$listapedidos,$idcomanda);
     }

     if($_GET['b']=='E'){
        $iddetalle = $_GET['iddetalle'];
        $l = new EntidadListarComanda;
        $l ->EliminarPedido($iddetalle);
        $objetoEntidad = new EdetalleUsuario;
        $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
        $pedido = new EntidadListarComanda;
        $listapedidos = $pedido ->ListarPedido($idcomanda);
        $verpedido = new formListarPedido;
        $verpedido -> formListarPedido2($listaprivilegios,$listapedidos,$idcomanda);
     }

}else{
    include_once("../shared/formMensajeSistema.php");
    
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("ACCESO NO PERMITIDO","<a href='../index.php'>Iniciar Session</a>");


}

?>                                    