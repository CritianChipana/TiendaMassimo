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
		
		<body>
		<form name="form1" action="Controlador/getUsuario.php" method="POST" >
		  <table width="268" border="0" align="center">
            <tr>
              <td colspan="3" align="center">Autenticacion</td>
            </tr>
            <tr>
              <td width="29">1.</td>
              <td width="102">Login:</td>
              <td width="123">
                <input name="login" type="text" id="login">
              </td>
            </tr>
            <tr>
              <td>2.</td>
              <td>Password:</td>
              <td><input name="password" type="password" id="password"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="2" align="right">
                <input name="bntAceptar" type="submit" id="bntAceptar" value="Ingresar">
              </td>
            </tr>
          </table>
        </form>
		</body>
		</html>
		<?php
	}
}
?>
