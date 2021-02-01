<?php
ini_set('display_errors', 'On');  
include_once '../Vista/formGestionarUsuario.php'; 
include_once '../Vista/formUsuarioPrivilegios.php'; 
include_once '../Modelo/privilegios.php';
include_once '../Modelo/usuarioPrivilegios.php';
include_once '../Modelo/Eusuario.php';


class controlGestionarUsuario
{
    public function gestionarUsuario()
    {
        $usuarios = new Eusuario();
        $usuariosEncontrados = $usuarios -> listarUsuarios(); 
        $formGestionarUsuario = new formGestionarUsuario();
       
        $formGestionarUsuario -> formGestionarUsuarioShow(  $usuariosEncontrados, NULL);
        
    }

    public function nuevoUsuario()
    {
        $nuevoUsuario = array(
            'nombre' => "",
            'apellidos' => "",
            'celular' => "",
            'direccion' => "",
            'correo' => "",
            'estado' => "1",
            'dni' => "",
            'password' => ""
        );

        $privilegios = new privilegios();
        $privilegiosD = $privilegios ->  obtenerPrivilegioSistema();
 

        $formNuevoUsuario = new formUsuarioPrivilegios();
        $formNuevoUsuario -> formUsuarioPrivilegiosShow($nuevoUsuario, NULL, $privilegiosD, NULL);
    }

    public function guardarUsuario($dni, $password, $nombre, $apellidos, $celular, $direccion, $correo, $estado)
    { 
        $privilegiosD = new privilegios();
        $privilegiosSistema = $privilegiosD -> obtenerPrivilegioSistema();
        $privilegiosAsignados = ARRAY();
        $i = 0;   
        foreach ($privilegiosSistema as $privilegioAsignados) {
            $idprivilegio = $privilegioAsignados['idprivilegio'];
            if (isset($_POST["{$idprivilegio}"])) {
                $privilegiosAsignados[$i] = $privilegioAsignados;
                $i++;
            }
        //echo $idprivilegio;
        }
        //var_dump($privilegiosSistema); 
        if ( strlen($nombre) < 1 ||  strlen($apellidos) < 1 ||
        strlen($dni) != 8|| strlen($direccion) < 5 ||
        $i == 0 || strlen($password) <4 ) {
        $mensaje = "Correcciones <br>";
        if (strlen($nombre) < 1 ) { $mensaje .= "El campo nombre esta vacio.<br>";
        }
        if (strlen($apellidos) < 1) {$mensaje .= "El campo apellidos esta vacio <br>";
        }
        if (strlen($dni) != 8 ) {$mensaje .= "Escriba solo 8 caracterres.<br>";$dni="";
        }
        if (strlen($direccion) < 4 ) {
            $mensaje .= "Escriba más de cinco caracterres en el campo direccion.<br>";
        }
        if ($i == 0) {
            $mensaje .= "Seleccione como minimo un privilegios<br>";
        }
        if (strlen($password) <4) {
            $mensaje .= "Escriba más de tres caracterres.<br>";
        }
            $nuevoUsuario = array(
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'celular' => $celular,
                'direccion' => $direccion,
                'correo' => $correo,
                'estado' => $estado,
                'dni' => $dni,
                'password' => $password
            );
 

            $formNuevoUsuario = new formUsuarioPrivilegios();
            $formNuevoUsuario -> formUsuarioPrivilegiosShow($nuevoUsuario, $privilegiosAsignados, $privilegiosSistema, $mensaje);
        } else {
            

            $usuario = new Eusuario();
            $dniActual = (isset($_SESSION['dni'])) ? $_SESSION['dni'] : NULL;
            
            if ($dniActual != NULL) { 
          
                $resultado = $usuario->modificarUsuario( $password, $nombre, $apellidos, $celular, $direccion, $correo, $estado, $dniActual);
                
            } else { 
            
                $resultado = $usuario->registrarUsuario($dni, $password, $nombre, $apellidos, $celular, $direccion, $correo, $estado );
            
            }

            if ($resultado == FALSE) {
                $mensaje = "EL dni INGRESADO YA EXISTE";
                $nuevoUsuario = array(
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                    'celular' => $celular,
                    'direccion' => $direccion,
                    'correo' => $correo,
                    'estado' => $estado,
                    'dni' => $dni,
                    'password' => $password
                    
                ); 
                
                $formNuevoUsuario = new formUsuarioPrivilegios();
                $formNuevoUsuario -> formUsuarioPrivilegiosShow($nuevoUsuario, $privilegiosAsignados, $privilegiosSistema, $mensaje);
            } else {
                $mensaje = "SE HA GUARDADO LOS DATOS DEL EMPLEADO EN LA BASE DE DATOS.";
                $usuarioPrivilegiosD = new usuarioPrivilegios();

                if ($dniActual != NULL) {
                    $usuarioPrivilegiosD -> eliminarPrivilegiosUsuario($dniActual);
                } 
                $resultado = $usuarioPrivilegiosD->registrarPrivilegiosUsuario($privilegiosAsignados, $dni);
                $usuariosEncontrados = $usuario -> listarUsuarios();
                
                $formGestionarUsuario = new formGestionarUsuario();
                $formGestionarUsuario -> formGestionarUsuarioShow( $usuariosEncontrados, $mensaje);
                
            }
        }
    }

    public function modificarUsuario($dni)
    {
        
        $usuarioD = new Eusuario(); 
        //echo $dni;
        $modificarusuario = $usuarioD->listarUsuarioPorDni($dni);
        $usuarioPrivilegiosD = new usuarioPrivilegios();
        $privilegiosAsignadosUsuario = $usuarioPrivilegiosD -> obtenerPrivilegiosUsuario($dni);
        
        $privilegiosD = new privilegios();
        $privilegiosSistemaActuales = $privilegiosD-> obtenerPrivilegioSistema();
    
        $formModoficiarUsuario = new formUsuarioPrivilegios();
        
        $formModoficiarUsuario-> formUsuarioPrivilegiosShow($modificarusuario, $privilegiosAsignadosUsuario, $privilegiosSistemaActuales, NULL);
    
    }
 
}