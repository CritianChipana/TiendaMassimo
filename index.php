<?php
//index.php
session_start();
session_destroy();
include_once("Vista/formAutenticarUsuario.php");
$objAcceso = new formAutenticarUsuario;
$objAcceso -> formAutenticarUsuarioShow();
?>
