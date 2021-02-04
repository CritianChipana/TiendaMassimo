<?php

if(isset($_POST['a'])){
// .

    // public function RegistrarComanda($dni,$fecha,$estado,$dnicliente,$empleado,$importe)
    $btnp=(isset($_POST['btnp'])) ? $_POST['btnp'] : '';
    $tamano =(isset($_POST['tamano']))? $_POST['tamano']:'';
    $dni =$_POST['dni'];
    // $fecha= date_default_timezone_set("America/Lima"); echo date("d") . " del " . date("m") . " del " . date("Y");
    $fecha=$_POST['fecha'];
    $contadorFecha =0;
    $estado = 1;
    $dnicliente = $_POST['dnicliente'];
    $contadorcliente =0;
    $empleado = $_POST['empleado'];
    $contadorempleado=0;
    $importe =0;
    $cont=0;
    $cont2=0;
    $cantidades =array();
    $precios = array();
    $idproductos = array();
    $negativo =0;

    //CAPTURAR 
    for($i=1; $i<=$tamano;$i++){
        if(isset($_POST[$i])){
            if($_POST[$i]!=''){
                array_push($cantidades,$_POST[$i]);
                array_push($idproductos,$_POST[$i."i"]);
                $cont++;
                if($_POST[$i]<0){
                    $negativo ++;
                } 
            }
        }

    }

   
    if($_POST['fecha']!=''){
        $contadorFecha++;
    }
    if($_POST['dnicliente']!=''){
        $contadorcliente++;
    }
    if($_POST['empleado']!=''){
        $contadorempleado++;
    }

        // CAPTURAR TODOS LOS PLATOS SELECCIONADOS POR EL CHECKBOX
    for($i=1;$i<=$tamano;$i++){
        if(isset($_POST[$i.'c'])){
            if($_POST[$i.'c']!=''){
                array_push($precios,$_POST[$i."c"]);
                $cont2++;
            }
        }
    }


    // for($i=0; $i<$cont;$i++){
    //         echo $idproductos[$i]. "<br> "; 
    // }

    // echo $cont;

    //CALCULAR IMPORTE
    if($cont==$cont2){

        for($i=0; $i<$cont;$i++){
            $importe = $importe + $precios[$i]*$cantidades[$i];
        }
    }

    // echo $importe."-";
    if($negativo!=0 || $cont == 0 || $cont2==0 || $cont!=$cont2|| $contadorcliente==0 || $contadorFecha==0 || $contadorempleado==0){
        echo    "<script>
                    alert('LLENE LOS CAMPOS CORRECTAMENTE');
                </script>";
        // echo $negativo."-".$cont."-".$cont2."-".$contadorcliente."-".$contadorFecha;
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
       //insertar comanda
    // public function RegistrarComanda($dni,$fecha,$estado,$dnicliente,$empleado,$importe)
        include_once("../Modelo/EntidadRegistrarComanda.php");
        $Rcomanda= new EntidadRegistrarComanda;
        $Rresu = $Rcomanda -> RegistrarComanda($dni,$fecha,$estado,$dnicliente,$empleado,$importe);
    
        // INSERTAR DETALLES COMANDA:
        // public function BuscarComanda($dnicliente,$fecha){
        // public function RegistraDetalleComanda($numero,$cantidades,$precios,$idproductos,$idcomanda){
        include_once("../Modelo/EntidadRegistrarDetalleComanda.php");
        $idcomandabuscado =$Rcomanda -> BuscarComanda($dnicliente,$fecha);
        // echo $idcomandabuscado;
        include_once("../Modelo/EntidadRegistrarDetalleComanda.php");
        $Dcomanda = new EntidadRegistrarDetalleComanda;
        $Dresu = $Dcomanda->RegistraDetalleComanda($cont,$cantidades,$precios,$idproductos,$idcomandabuscado);
       
        if($Rresu ==1 && $Dresu==1){
            include_once("../Modelo/EdetalleUsuario.php");
            include_once("../Vista/fomMostrarComanda.php");
            include_once("../Modelo/EntidadDetallesComanda.php");
            $objetodetalle = new EdetalleUsuario();
            $listaprivilegios = $objetodetalle-> obtenerPrivilegios($dni);
            $objetocomanda = new formMostrarComanda;
            $objetoMostrarComanda = new EntidadDetallesComanda;
            $l = $objetoMostrarComanda->listarComanda($idcomandabuscado);
            $objetocomanda -> formMostrarComandaShow($listaprivilegios,$l,$cont);
        }
    }

   

}else{
    include_once("../shared/formMensajeSistema.php");
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("Acceso Incorrecto","<a href='../index.php'>Ingresar Usuario</a>");
    
}

?>