<?php
ini_set('display_errors', 'On');  
session_start(); 
    if (isset($_POST['p-6'])) {
        include_once 'controlGestionarUsuario.php';
        unset($_SESSION['DNI']);
        $controlGestionarUsuario = new controlGestionarUsuario();
        $controlGestionarUsuario -> gestionarUsuario();
    
	} else if (isset($_POST['nuevoUsuario'])) {
        include_once 'controlGestionarUsuario.php';
        $controlGestionarUsuario = new controlGestionarUsuario();
        $controlGestionarUsuario -> nuevoUsuario();
    
	} else if (isset($_POST['modificarUsuario'])) {
        $dni = $_POST['DNI'];
        $_SESSION['DNI'] = $dni;
         
        include_once 'controlGestionarUsuario.php';
        $controlGestionarUsuario = new controlGestionarUsuario();
        $controlGestionarUsuario-> modificarUsuario($dni);
  
	} else if (isset($_POST['guardarUsuario'])) {
               
                $dni = (isset($_POST['DNI'])) ? trim($_POST['DNI']): '';
        
        $password = trim($_POST['password']);
        $nombre = trim($_POST['nombre']);
        $apellidos = trim($_POST['apellidos']);
        $celular = trim($_POST['celular']);
        $direccion = trim($_POST['direccion']);
        $correo = trim($_POST['correo']);
        $estado = "0";
        $dniActual = "";

        //echo $dni;
        if (isset($_POST['dniActual'])) {
            $dniActual = $_POST['dniActual'];
        }

        if (isset($_POST['estado'])) {
            $estado = "1";
        }
        
        include_once 'controlGestionarUsuario.php';
        $controlGestionarUsuario = new controlGestionarUsuario();
        $controlGestionarUsuario -> guardarUsuario($dni, $password, $nombre, $apellidos, $celular, $direccion, $correo, $estado, $dniActual);
    
        } 
        else{
                include_once("../shared/formMensajeSistema.php");
                $objetoMensaje = new formMensajeSistema;
                $objetoMensaje -> formMensajeSistemaShow("Acceso Incorrecto","<a href='../../laJepeta/index.php'>Ingresar Usuario</a>");
                
            }