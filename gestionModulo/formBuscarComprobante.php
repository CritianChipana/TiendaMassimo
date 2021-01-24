
<?php

class formBuscarComprobante{

    function formBuscarComprobanteShow(){
?>
        <form name="fomularioBuscar" action="controlCamposComprobante.php" method="post">

            <label for="codigo">Codigo Del Comprobante:
            <input type="number" name="codigo" id="codigo">
            </label><br>
            
            <label for="">Tipo de Comprobante:
            <select name="tipo" id="tipo">
                <option value="seleccione">Seleccione</option>
                <option value="boleta">Boleta</option>
                <option value="factura">Factura</option>
            </select>
            </label><br>
            <input name="botonbuscarcomprobante" type="submit" value="Buscar">
        </form>
        <form action="bienvenidoPrueba.php" method="post">
                <input type="submit" value="Ir a Inicio">
        </form>
    
<?php
    }
}
if(isset($_POST['volver'])){
    $nuevo = new formBuscarComprobante;
    $nuevo->formBuscarComprobanteShow();
}

?>