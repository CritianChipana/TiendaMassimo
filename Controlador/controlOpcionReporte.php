
<?php


$fechaInicio=$_POST['fecha_inicio'];
$fechaFinal=$_POST['fecha_final'];
$seleccion =$_POST['seleccion'];



   

    if($seleccion=="F")
    {
        include_once("../Vista/formVisualizarReporteFactura.php");
        $objfrf = new formVisualizarReporteFactura;

        $objfrf->mostrarFacturas($fechaInicio,$fechaFinal);
    }
    else if($seleccion=="B")
    {
        include_once("../Vista/formVisualizarReporteBoleta.php");
        $objfrb = new formVisualizarReporteBoleta;

        $objfrb->mostrarBoletas($fechaInicio,$fechaFinal);
    }
    

//dasdasdadasd




?>



    

<?php



?>