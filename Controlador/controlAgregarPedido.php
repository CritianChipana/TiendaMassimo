<?php

if(isset($_POST["aa"])){
    $dni = $_POST["dni"];
    $tamano =(isset($_POST['tamano']))? $_POST['tamano']:'';
    $idcomanda = $_POST['idcomanda'];
    $cantidades =array();
    $precios = array();
    $idproductos = array();
    $negativo =0;
    $cont = 0;
    $cont2 = 0;
    $importe = 0;

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

    for($i=1;$i<=$tamano;$i++){
        if(isset($_POST[$i.'c'])){
            if($_POST[$i.'c']!=''){
                array_push($precios,$_POST[$i."c"]);
                $cont2++;
            }
        }
    }

 

    // echo $idcomanda ."<hr>";
    // for($i=0; $i<$cont;$i++){
    //     echo $idproductos[$i]. "<br> "; 
    //     echo $cantidades[$i]. "<br> ";
    // }
    include_once("../Modelo/EntidadProducto.php");
    include_once("../Modelo/EntidadProforma.php");
    include_once("../Vista/formGenerarProforma.php");
    include_once("../Modelo/EdetalleUsuario.php");
    include_once("../Modelo/EntidadDetallesProforma.php");

    if($negativo!=0 || $cont == 0 || $cont2==0 || $cont!=$cont2 ){
        echo    "<script>
                    alert('LLENE LOS CAMPOS CORRECTAMENTE');
                </script>";
        // echo $negativo."-".$cont."-".$cont2."-".$contadorcliente."-".$contadorFecha;
        include_once("../Vista/formGenerarProforma.php");
        include_once("../Modelo/EntidadProducto.php");
        include_once("../Modelo/EdetalleUsuario.php");
        $objetoEntidad = new EdetalleUsuario;
        $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
        $objetoEntidad = new EntidadProducto;
        $objetoProforma = new formGenerarProforma();
        $listaproductos = $objetoEntidad->listar_producto();
        $objetoProforma ->formGenerarProformashow($listaprivilegios,$listaproductos);
    }else{


        $objetoEntidad = new EdetalleUsuario;
        $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
        $ObjetoTotal = new EntidadProforma;
        $importe2 = $ObjetoTotal->ObtenerTotal($idcomanda);
        
        // public function RegistraDetalleProforma($numero,$cantidades,$precios,$idproductos,$idcomanda){ 
        if(is_numeric($importe2)){
            // 
            if($cont==$cont2){
                for($i=0; $i<$cont;$i++){
                    $importe = $importe + $precios[$i]*$cantidades[$i];
                }
            }
            
            $ObjetoTotal->ActualizarTotal($idcomanda,$importe+$importe2);

            $Dcomanda = new EntidadDetallesProforma;
            $Dresu = $Dcomanda->RegistraDetalleProforma($cont,$cantidades,$precios,$idproductos,$idcomanda);
        
            $objetoEntidad = new EdetalleUsuario;
            $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
            $objetoEntidad = new EntidadProducto;
            $objetoProforma = new formGenerarProforma();
            $listaproductos = $objetoEntidad->listar_producto();

            $objetoProforma ->formGenerarProformaShow($listaprivilegios,$listaproductos);

        }else{
            echo    "<script>
                        alert('Se produjo un error en la busqueda del precio, Vuelva a intentarlo');
                    </script>";
            $objetoC = new formGenerarProforma;
            $objetoEntidad2 = new EntidadProducto;
            // $objetoProforma = new formAgregarPlatillo();
            $listaproductos = $objetoEntidad2->listar_producto();
            $objetoC -> formGenerarProformaShow($listaprivilegios,$listaproductos);
        }
    }

}else{
    include_once("../shared/formMensajeSistema.php");
    
    $objetoMensaje = new formMensajeSistema;
    $objetoMensaje -> formMensajeSistemaShow2("ACCESO NO PERMITIDO","<a href='../index.php'>Iniciar Session</a>");

}

?>