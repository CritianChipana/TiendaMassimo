
<?php

class controlGenerarComprobanteDevolucion{

    public function verificarCampos($codigo,$tipo){

        include_once("../model/EntidadBuscarComprobante.php");

        $objetoEntidadBucar = new EntidadBuscarComprobante;
        $r = $objetoEntidadBucar -> validadComprobante($codigo,$tipo);
        if($r==NULL){
            echo     "<script>
                    alert('No se encontro nigun comprobante, Verifique codigo o tipo de comprobante');
                    </script>";
            include_once("formBuscarComprobante.php");
            $objetoBuscar = new formBuscarComprobante;
            $objetoBuscar->formBuscarComprobanteShow();


            // include_once("../shared/formMensajeSistema.php");
            // $objeMensaje = new formMensajeSistema;
            // $objeMensaje ->formMensajeSistemaShow("Datos no encontrados","<a href='formBuscarComprobante.php'>Volver a Buscar</a>");
            
        }else{
            include_once("formMostrarComprobanteDevolucion.php");
            $objetoMostrarComprobante = new formMostrarComprobanteDevolucion;
            $objetoMostrarComprobante -> mostrarDatosComprobante($r,$tipo);
            
            
        }


    }

}

?>