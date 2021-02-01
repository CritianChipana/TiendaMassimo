<?php
class controlGenerarComprobanteDevolucion{
    public function verificarCampos($codigo,$tipo,$dni){
        // include_once("../model/EntidadBuscarComprobante.php");
        include_once("../Modelo/EntidadBuscarComprobante.php");
        $objetoEntidadBucar = new EntidadBuscarComprobante;
        $r = $objetoEntidadBucar -> validadComprobante($codigo,$tipo);
        if($r==NULL){
            echo     "<script>
                    alert('No se encontro nigun comprobante, Verifique codigo o tipo de comprobante');
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
            // include_once("formMostrarComprobanteDevolucion.php");
            include_once("../Modelo/EdetalleUsuario.php");
            $objetoEntidad = new EdetalleUsuario;
            $listaprivilegios =$objetoEntidad -> obtenerPrivilegios($dni);
            include_once("../Vista/formMostrarComprobanteDevolucion.php");
            $objetoMostrarComprobante = new formMostrarComprobanteDevolucion;
            $objetoMostrarComprobante -> mostrarDatosComprobante($r,$tipo,$listaprivilegios);     
        }
    }
}

?>