
<?php


class  formGenerarReportedeVentas{

    public function MostrarformReportedeVentasShow($listaPrivilegios)
    {

        $dni = "";
        for($i=0;$i<1;$i++){
            $dni = $listaPrivilegios[$i]['dni'];
        }
    ?>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="../public/css/normalize.css">
		    <link rel="stylesheet" type="text/css" href="../public/css/nav.css"> 
            <title>Generar Reporte</title>
        </head>
        <body style="background-color: #bbdefb;">
                <?php include_once("../shared/nav.php");
                            $objNav=new nav();
                            $objNav->navShow($listaPrivilegios);
                ?>
                <br>
            <h2> <center>Búsqueda de Facturas y boletas</center></h2>
            <nav class="navbar navbar-light " style="background-color: #bbdefb;">
                <div class="container-fluid">
                    <!-- <h2> <center>Búsqueda de Facturas y boletas</center></h2> -->
                </div>
                
                <div class="container-fluid">
                    
                </div>
                <div class="container-fluid">
                    
                </div>
            </nav>

            <div style="height: 32px;"></div>
            <div class="row">
                <div class="col-4 col-md-4 col-lg-4">

                </div>
                <div class="col-4 col-md-4 col-lg-4">
                    <form  method="post" action="../Controlador/controlOpcionReporte.php" id="form_consultar_boletas">
                        <div >
                            <div class="mb-3">
                                <label for="fecha_inicio" class="form-label">Fecha inicial</label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
                            </div>
                            
                            <div style="width: 32px; height: 12px; "></div>

                            <div class="mb-3">
                                <label for="fecha_final" class="form-label">Fecha final</label>
                                <input type="date" class="form-control" name="fecha_final" id="fecha_final" required>
                            </div>
                            
                            <input type="hidden" name="seleccion" id="seleccion">
                            <input type="hidden" name="dni" value="<?php echo $dni; ?>">
                            <div style="width: 32px; height: 12px; "></div>
                            <div>

                                <div style="display: flex; float:right;">
                                    <input type="submit" class="btn btn-info"  formaction="../Controlador/controlOpcionReporte.php" name="reporte_boleta" buscar value="Reporte Boleta"  onclick="seleccionBoleta();">
                                    <div style="width: 32px;"></div>
                                    <input type="submit" class="btn btn-info"  name="reporte_factura" buscar value="Reporte Factura"  onclick="seleccionFactura();">

                                </div>
                                
                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4 col-md-4 col-lg-4">

                </div>
            </div>

            <script>
                

                function seleccionBoleta()
                {
                    document.getElementById("seleccion").value="B";
                   
                }

                function seleccionFactura(){
                    document.getElementById("seleccion").value="F"; 

                }
            </script>
            
        </body>
    </html>

   <?php }



}

// .
?>