<?php
ini_set('display_errors', 'On');  
include_once '../Vista/formGestionarUsuario.php'; 
include_once '../Vista/formAgregarUsuario.php'; 
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
        $formGestionarUsuario -> formGestionarUsuarioShow($usuariosEncontrados, NULL);
        
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
            'DNI' => "",
            'password' => ""
        );

        $privilegios = new privilegios();
        $privilegiosD = $privilegios -> obtenerPrivilegiosDelSistema();
 

        $formNuevoUsuario = new formAgregarUsuario();
        $formNuevoUsuario -> formAgregarUsuarioShow($nuevoUsuario, NULL, $privilegiosD, NULL);
    }

    public function guardarUsuario($dni, $password, $nombre, $apellidos, $celular, $direccion, $correo, $estado)
    { 
        $privilegiosD = new privilegios();
        $privilegiosSistema = $privilegiosD -> obtenerPrivilegiosDelSistema();
        $privilegiosAsignados = ARRAY();
        $i = 0;   
        foreach ($privilegiosSistema as $privilegioAsignados) {
            $idprivilegio = $privilegioAsignados['idprivilegio'];
            if (isset($_POST["{$idprivilegio}"])) {
                $privilegiosAsignados[$i] = $privilegioAsignados;
                $i++;
            }
        echo $idprivilegio;
        }
        //var_dump($privilegiosSistema); 
        if ( strlen($nombre) < 4 ||  strlen($apellidos) < 4 ||
        strlen($dni) != 8|| strlen($direccion) < 5 ||
        $i == 0 || strlen($password) <4 ) {
        $mensaje = "Correcciones <br>";
        if (strlen($nombre) < 4 ) { $mensaje .= "Escriba más de tres caracterres.<br>";
        }
        if (strlen($apellidos) < 4) {$mensaje .= "Escriba más de tres caracterres.<br>";
        }
        if (strlen($dni) != 8 ) {$mensaje .= "Escriba solo 8 caracterres.<br>";
        }
        if (strlen($direccion) < 4 ) {
            $mensaje .= "Escriba más de cinco caracterres.<br>";
        }
        if ($i == 0) {
            $mensaje .= "Seleccione como minimo un privilegio<br>";
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
                'DNI' => $dni,
                'password' => $password
            );
 

            $formNuevoUsuario = new formAgregarUsuario();
            $formNuevoUsuario -> formAgregarUsuarioShow($nuevoUsuario, $privilegiosAsignados, $privilegiosSistema, $mensaje);
        } else {
            

            $usuario = new Eusuario();
            $dniActual = (isset($_SESSION['DNI'])) ? $_SESSION['DNI'] : NULL;
            
            if ($dniActual != NULL) { 
          
                $resultado = $usuario->modificarUsuario( $password, $nombre, $apellidos, $celular, $direccion, $correo, $estado, $dniActual);
                
            } else { 
            
                $resultado = $usuario->registrarUsuario($dni, $password, $nombre, $apellidos, $celular, $direccion, $correo, $estado, $usuario);
            
            }

            if ($resultado == FALSE) {
                $mensaje = "ERROR, NO SE HA PODIDO GUARDAR AL USUARIO EN LA BD,POR FAVOR VERIFIQUE SI EL DNI EXISTE EN EL SISTEMA O COMUNICARSE CON EL ADMINISTRADOR DE LA BD.";
                $nuevoUsuario = array(
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                    'celular' => $celular,
                    'direccion' => $direccion,
                    'correo' => $correo,
                    'estado' => $estado,
                    'DNI' => $dni,
                    'password' => $password
                    
                ); 
                
                $formNuevoUsuario = new formAgregarUsuario();
                $formNuevoUsuario -> formAgregarUsuarioShow($nuevoUsuario, $privilegiosAsignados, $privilegiosSistema, $mensaje);
            } else {
                $mensaje = "SE HA GUARDADO LOS DATOS DEL EMPLEADO EN LA BASE DE DATOS.";
                $usuarioPrivilegiosD = new usuarioPrivilegios();

                if ($dniActual != NULL) {
                    $usuarioPrivilegiosD -> eliminarPrivilegiosUsuario($dniActual);
                } 
                $resultado = $usuarioPrivilegiosD->registrarPrivilegiosUsuario($privilegiosAsignados, $dni);
                $usuariosEncontrados = $usuario -> listarUsuarios();
                
                $formGestionarUsuario = new formGestionarUsuario();
                $formGestionarUsuario -> formGestionarUsuarioShow($usuariosEncontrados, NULL);
                
            }
        }
    }

    public function modificarUsuario($dni)
    {
        
        $usuarioD = new Eusuario(); 
        //echo $dni;
        $modificarusuario = $usuarioD->buscarUsuarioPorDni($dni);
        $usuarioPrivilegiosD = new usuarioPrivilegios();
        $privilegiosAsignadosUsuario = $usuarioPrivilegiosD -> obtenerPrivilegiosUsuario($dni);
        
        $privilegiosD = new privilegios();
        $privilegiosSistemaActuales = $privilegiosD->obtenerPrivilegiosDelSistema();
    
        $formModoficiarUsuario = new formAgregarUsuario();
        
        $formModoficiarUsuario-> formAgregarUsuarioShow($modificarusuario, $privilegiosAsignadosUsuario, $privilegiosSistemaActuales, NULL);
    
    }
 
}