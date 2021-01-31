<?php 
include_once('../Controlador/conexion.php');
class EntidadComanda extends conexion{
    
  	public function listarComanda()
  	{ 
        $consulta="SELECT * FROM comanda WHERE estadocomprobante=1 ";
        $resultado = mysqli_query($this->conectar(),$consulta);
        $this->desconectar();
        return $resultado;
 	}
	public function detalleComandaID($idcomanda)
	{
		$consulta = "SELECT * FROM detallecomanda DC, producto PR, comanda C  WHERE DC.idcomanda = '$idcomanda' AND DC.idproducto=PR.idproducto AND DC.idcomanda=C.idcomanda";
		$resultado = mysqli_query($this->conectar(),$consulta);
		$num_registros=mysqli_num_rows($resultado);

		for ($i=0; $i <$num_registros ; $i++) { 
			$fila[$i]=mysqli_fetch_array($resultado);
		}
		if (isset($fila)) {
				return $fila;		
		}
		else
		{
			$fila="NO SE ENCONTRARON COINCIDENCIAS";
			return $fila;
		}

	}
 }
 ?>
