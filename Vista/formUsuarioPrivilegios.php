<?php
class formUsuarioPrivilegios
{
    public function formUsuarioPrivilegiosShow ($usuario, $privilegiosAsignados, $privilegiosSistema, $mensaje)
    {
        
        $estadoUsuario = ""; 
        if (strcmp($usuario['estado'], "1") == 0) {
            $estadoUsuario = "checked";
        }
        ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Detalle usuario</title>
            <link rel="stylesheet" href="../Public/bootstrap.min.css"> 
        </head>
        <?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow([]);
		?>
        <body>
        <?php
        if ($mensaje != NULL) {
            ECHO "<div class= 'alert alert-danger'>{$mensaje}</div>";
        }
        ?>
        <div class="modal-body">
            <form action="../Controlador/getGestionarUsuario.php" method="post">
            <div class="row" >
                    <div class="col-7">
                        <div class="card"> 
                            <div class="card-body">
                                <h5>USUARIO: </h5>
                                <div class="form-row mb-0">
                                    <div class="form-group col-md-5">
                                            <?php if ($usuario['dni']==""){?> 
                                                <label >dni: </label>
                                                <input class="form-control " type="text" name="dni" maxlength="8" 
                                                    value="<?PHP ECHO $usuario['dni']; ?>">
                                         
                                            <?php } else{ ?> 
                                                    <label >dni: </label>
                                                    <input class="form-control" type="hidden" name="dni" maxlength="8" 
                                                    value="<?PHP ECHO $usuario['dni']; ?>">
                                                    <input class="form-control" type="text" name="0" maxlength="8" 
                                                    value="<?PHP ECHO $usuario['dni']; ?>" disabled>
                                                
                                            <?php } ?>
                                    </div>

                                    <div class="form-group col-md-5">
                                    <label >Contraseña: </label>
                                            <input class="form-control" type="password" name="password"
                                                   maxlength="9" value="<?PHP ECHO $usuario['password']; ?>">
                                    </div>

                                    
                                    <div class="form-group col-md-2">
                                    <label>Estado: </label><br>
                                    <select class='form-control' name='estado' id='estado' <?PHP ECHO $estadoUsuario; ?>>
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option> 
                                    </select>        
                                    </div>
                                </div>
                                
                                <div class="form-row mb-0">
                                    <div class="form-group col-md-6">
                                        <label >Nombres: </label>
                                        <input class="form-control" type="text" name="nombre" maxlength="50" value="<?PHP echo $usuario['nombre']; ?>">
                                    </div>  
                                    <div class="form-group col-md-6">
                                        <label>Apellidos: </label>
                                        <input class="form-control" type="text" name="apellidos" maxlength="80"
                                            value="<?PHP ECHO $usuario['apellidos']; ?>">
                                    </div>
                                </div>  
                                
                                <div class="form-row mb-0">
                                    <div class="form-group col-md-6">
                                        <label >Celular: </label>
                                        <input class="form-control" type="text" name="celular" maxlength="15"
                                               value="<?PHP ECHO $usuario['celular']; ?>">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label>Correo; </label>
                                        <input class="form-control" type="text" name="correo" maxlength="120"
                                            value="<?PHP ECHO $usuario['correo']; ?>">
                                    </div> 
                                </div>
                                <div class="form-row mb-0">
                                    <div class="form-group col-md-12">
                                        <label>Dirección: </label>
                                        <input class="form-control" type="text" name="direccion" maxlength="120"
                                            value="<?PHP ECHO $usuario['direccion']; ?>">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <label >PRIVILEGIOS:</label><br>
                                        <?PHP
                                        $privilegios = "";
                                        $estado = "";
                                        FOREACH ($privilegiosSistema as $privilegioSistema) {
                                            if ($privilegiosAsignados != NULL) {
                                                FOREACH ($privilegiosAsignados as $privilegioAsignado) {
                                                    IF ($privilegioSistema['idprivilegio'] == $privilegioAsignado['idprivilegio']) {
                                                        $estado = "checked";
                                                    }
                                                }
                                            }
                                            $privilegios .= "<label style='font-size:15px;' class='form-check-label lead'><input class='form-check-input' type='checkbox' {$estado} name='{$privilegioSistema['idprivilegio']}'>&nbsp;&nbsp;{$privilegioSistema['nombrep']}</label><br>";
                                            $estado = "";
                                        }

                                        ECHO $privilegios;
                                        ?>
                                        <br>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div><br>
                <div class="modal-footer">
                    <form action="../Controlador/getGestionarUsuario.php" method="post">
                        <input type="submit" class="btn btn-primary" value="ATRÁS" name="p-6">
                    </form>
                    <input type="hidden" value="<?php ECHO $usuario['dni']; ?>" name="dniAntiguo">
                    <input type="submit" class="btn btn-success" value="GUARDAR" name="guardarUsuario">
                    
                </div>
            </form>
 
            

        </div>
        <script src="../Public/js/jquery-3.2.1.js"></script>
        <script src="../Public/bootstrap.min.css"></script>
        </body>
        </html>
        <?php
    }
}
         