<?php
class formGestionarUsuario
{
    
    public function formGestionarUsuarioShow($usuarios, $mensaje) {
        ?>	 
        <!DOCTYPE html>
        <html lang="en">

        <?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow([]);
		?>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Gestionar usuario</title> 
            <link rel="stylesheet" type="text/css" href="../public/css/normalize.css">
		    <link rel="stylesheet" type="text/css" href="../public/css/nav.css">  
            <link rel="stylesheet" href="../Public/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
        </head> 
        <body> 

        <script>setTimeout(()=>{document.getElementById("mensaje").style.cssText="display:none"},2000)</script>
        <?php
        if ($mensaje != NULL) {

            echo "<div class= 'alert alert-danger' id='mensaje'>{$mensaje}</div>";
        }
        ?>
        <div class="container"> 
        <div class="row">
        <div class="col-lg-6"><br><br>
                        <form action="../Controlador/getGestionarUsuario.php" method="post">
                            <input type="submit" class="material-icons" value="post_add"
                                   name="nuevoUsuario">
            </form> 
            
            </div>    
            <div class="col-lg-6"> <br><br>
            <h3 align="right" >Gestionar usuarios</h3> 
            </div>  
            </div><br> 

            <table class='table'>
                <thead class="thead-dark">
                <tr>
                    <th scope="col" >dni</th>
                    <th scope="col" >Nombre</th>
                    <th scope="col" >Apellidos</th> 
                    <th scope="col" >Celular</th>
                    <th scope="col" >Direccion</th>
                    <th scope="col" >Correo</th>
                    <th scope="col" >Estado</th>
                    <th scope="col" >Acción</th>
                </tr> 
                </thead>
                <tbody>
                <?php
                if ($usuarios != null) {

                    $tbody = "";
                    $i = 1;
                    foreach ($usuarios as $usuario) {
                        $estado = "ACTIVO";
                        if (strcmp($usuario['estado'], "0") == 0) {
                            $estado = "INACTIVO";
                            
                        }
     
                        $tbody .= " <tr>";
                        $tbody .= " <td>{$usuario['dni']}</td>";
                        $tbody .= " <td>{$usuario['nombre']}</td>";
                        $tbody .= " <td>{$usuario['apellidos']}</td>"; 
                        $tbody .= " <td>{$usuario['celular']}</td>";
                        $tbody .= " <td>{$usuario['direccion']}</td>";
						$tbody .= " <td>{$usuario['correo']}</td>";
                        $tbody .= " <td>{$estado}</td>";
                        $tbody .= " <td>"
                            . "         <form action='../Controlador/getGestionarUsuario.php' method='post'>"
                            . "             <input type='submit' class='material-icons' value='edit' name='modificarUsuario'>"
                            . "             <input type='hidden' value='{$usuario['dni']}' name='dni'>"
                            . "         </form>"
                            . "     </td>";

                        $tbody .= " </tr>";
                        $i++;
                    }
                    echo $tbody;
                }
                ?>
                </tbody>
            </table> 
        </div>

        <script src="../Public/js/jquery-3.2.1.js"></script>
        <script src="../Public/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    }
} 