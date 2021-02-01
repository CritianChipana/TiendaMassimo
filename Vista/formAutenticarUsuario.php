<?php
//formAutenticarUsuario.php
class formAutenticarUsuario
{
	public function formAutenticarUsuarioShow()
	{
		?>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Autenticacion</title>
		</head>
    <link href="Public/css/login.css" rel="stylesheet" id="bootstrap-css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src=Public/js/login.js"></script>
		
		<body>
    <div class="container">
  	<div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
		          <form name="form1" action="Controlador/getUsuario.php" method="POST" >
              <input name="login" type="text" id="login">
              <input name="password" type="password" id="password">
              <input name="bntAceptar" type="submit" id="bntAceptar" value="Ingresar">
        </form>
        </div>
        </div>  
    </div>
		</body>
		</html>
		<?php
	}
}
?>
