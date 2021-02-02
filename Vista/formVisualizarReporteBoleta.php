<?php



 class formVisualizarReporteBoleta{



    function mostrarBoletas($fechaInicio,$fechaFinal,$listaPrivilegios)
    {
        $dni = "";
        for($i=0;$i<1;$i++){
            $dni = $listaPrivilegios[$i]['dni'];
        }

        include_once("../Modelo/EntidadBoleta.php");
        $boleta = new EntidadBoleta;
        $resultado = $boleta->boletasentreFechas($fechaInicio,$fechaFinal);

        $aciertos = mysqli_num_rows($resultado);
        for($i = 0; $i < $aciertos; $i++)
        {
            $filaEncontrada[$i] = mysqli_fetch_array($resultado); 
        }
    

        if($resultado->num_rows!=0)
        {?>
           
           <html lang="en" >
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" media="all">
                <title>Boletas</title>
                <link rel="stylesheet" type="text/css" href="../public/css/normalize.css">
		        <link rel="stylesheet" type="text/css" href="../public/css/nav.css"> 
            </head>
            <body>
                        <?php include_once("../shared/nav.php");
                            $objNav=new nav();
                            $objNav->navShow($listaPrivilegios);
                        ?>
                <div id="reporte_impresion">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <h2> Reporte de boletas</h2>
                    </div>
                    <div class="container-fluid">
                        <h3> Cantidad de boletas:  &nbsp<?php echo$resultado->num_rows; ?></h3>
                    </div>
                    <div class="container-fluid">
                        <h4> Boletas emitidas entre : <?php echo $fechaInicio; ?>&nbsp  y &nbsp<?php echo $fechaFinal; ?></h4>
                    </div>
                </nav>
                
                <table class="table" >
                    <thead class="table-dark">
                        <tr>
                       <!-- <th scope="col">#</th>-->
                        <th scope="col" style="text-align: center;">Código</th>
                        <th scope="col" style="text-align: center;">Fecha </th>
                        <th scope="col" style="text-align: center;">Cliente</th>
                        <th scope="col" style="text-align: center;">Total</th>
                        </tr>
                    </thead>
                    <tbody >
                <?php 
                    for($i=0; $i<$resultado->num_rows; $i++)
                    {?>
                         <tr>
                        
                        <td style="text-align: center;"><?php echo ($filaEncontrada[$i]['idboleta']) ?></td>
                        <td  style="text-align: center;"><?php echo ($filaEncontrada[$i]['fechaentrega']) ?></td>
                        <td style="text-align: center;"><?php echo ($filaEncontrada[$i]['idcliente']) ?></td>
                        <td style="text-align: center;"><?php echo ($filaEncontrada[$i]['total']) ?></td>
                        </tr>
                        
                   <?php }
                 ?>

                    
                       
                    </tbody>
                    </table> 

                </div>
                <div style="height: 24px;"></div>

                <div >
                    <div class="row">
                        <div class="col-4 col-md-4">

                        </div>
                        <div class="col-2 col-md-2">
                            <button type="button" class="btn btn-primary btn-sm" style="width: 100%;" onclick="imprimir();">Imprimir</button>
                    
                        </div>
                        <div style="width: 32px;;"></div>
                        <div class="col-2 col-md-2">
                            <form action="controlVerificarAccesoReportedeVentas.php" method="post">
                                <input name="p-7" type="hidden"/>
                                <input type="hidden" name="dni" value="<?php echo $dni; ?>">   
                                <button type="submit" style="width: 100%;" class="btn btn-secondary btn-sm" >Atras</button>
                            </form>
                        </div>
                        <div class="col-4 col-md-4">

                        </div>
                    </div>
                </div>


                <script>

                    function imprimir()
                    {
                        let content = document.getElementById("reporte_impresion");
                        var ventimp = window.open(' ', 'popimpr');
                        ventimp.document.write( content.innerHTML );
                        ventimp.document.close();
                        ventimp.print( );
                        ventimp.close();
                    }
                </script>
            </body>

            <div>
                
            </div>
            </html>
            
            <?php
        }

        else{
            include_once("../shared/formMensajeSistema.php");
            $objetoMensaje = new formMensajeSistema;
            $objetoMensaje -> formMensajeSistemaShow2("Fechas incorrectas","<a href='../index.php'>Inicio</a>");
        }

        
   }
 }
// .

?>