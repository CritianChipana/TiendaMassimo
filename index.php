<?php
//index.php
include_once("segurityModule/formAutenticarUsuario.php");
$objAcceso = new formAutenticarUsuario;
$objAcceso -> formAutenticarUsuarioShow();
?>
