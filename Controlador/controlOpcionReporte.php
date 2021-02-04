
<?php


$fechaInicio=$_POST['fecha_inicio'];
$fechaFinal=$_POST['fecha_final'];
$seleccion =$_POST['seleccion'];
$dni = $_POST['dni'];

include_once("../Modelo/EdetalleUsuario.php");
$privilegio = new EdetalleUsuario;
$listaprivilegios = $privilegio->obtenerPrivilegios($dni);
   

    if($seleccion=="F")
    {
        include_once("../Vista/formVisualizarReporteFactura.php");
        $objfrf = new formVisualizarReporteFactura;

        $objfrf->mostrarFacturas($fechaInicio,$fechaFinal,$listaprivilegios);
    }
    else if($seleccion=="B")
    {
        include_once("../Vista/formVisualizarReporteBoleta.php");
        $objfrb = new formVisualizarReporteBoleta;

        $objfrb->mostrarBoletas($fechaInicio,$fechaFinal,$listaprivilegios);
    }
    
// .
//dasdasdadasd




?>



    

<?php



?>