<?php 
	include_once("../Controlador/conexion.php");
	class EntidadBoleta extends conexion{

		public function listarBoleta(){

		}
		public function agregarBoletaC($idcomanda){
            
			$consulta = "SELECT * FROM detalleComanda DC, producto PR, Comanda C  WHERE DC.idcomanda = '$idcomanda' AND DC.idproducto=PR.idproducto AND DC.idcomanda=C.idcomanda";
            $resultado = mysqli_query($this->conectar(),$consulta);
            $num_registros = mysqli_num_rows($resultado);
            for($i = 0; $i < $num_registros; $i++){
                $fila[$i] = mysqli_fetch_array($resultado);
            } 
            $empleado=$fila[0]['empleado'];
            $fecha=$fila[0]['fecha'];
            $total=$fila[0]['total'];
            $estadocomprobante=$fila[0]['estadocomprobante'];
            $insertboleta="INSERT INTO boleta (empleado,fecha,total,estadocomprobante) VALUES ('$empleado','$fecha','$total','$estadocomprobante')";
            $resultado = mysqli_query($this->conectar(),$insertboleta);

            $insertdetalleboleta="INSERT INTO detalleboleta (idboleta,idproducto,cantidad,precio) VALUES ";
                foreach ($fila as $res){
                    $idcomanda=$res['idcomanda'];
                    $idproducto=$res['idproducto'];
                    $cantidad=$res['cantidad'];
                    $precio=$res['precio'];
                    $precio=$res['precio']*$res['cantidad'];
                     $insertdetalleboleta=$insertdetalleboleta."('$idcomanda','$idproducto','$cantidad','$precio'),";
                }
                $insertdetalleboleta=substr($insertdetalleboleta, 0, -1);
            $resultado = mysqli_query($this->conectar(),$insertdetalleboleta);

            $updateestado="UPDATE comanda SET estadocomprobante=0 WHERE idcomanda='$idcomanda'";
            $resultado = mysqli_query($this->conectar(),$updateestado);
          
		}
		public function agregarBoletaP($idproforma){
			$consulta="SELECT * FROM detalleProforma DP, producto PR, proforma P, usuario U WHERE DP.idproforma = '$idproforma' AND DP.idproducto=PR.idproducto AND DP.idproforma=P.idproforma AND P.dni=U.dni ";
            $resultado = mysqli_query($this->conectar(),$consulta);
            $num_registros = mysqli_num_rows($resultado);
            
            for($i = 0; $i < $num_registros; $i++){
                $fila[$i] = mysqli_fetch_array($resultado); 
            }
            $empleado=$fila[0]['nombre']." ".$fila[0]['apellidos'];
            $fecha=$fila[0]['fecha'];
            $fechaentrega=$fila[0]['fechaentrega'];
            $idcliente=$fila[0]['idcliente'];           
            $total=$fila[0]['total'];
            $estadocomprobante=$fila[0]['estadocomprobante'];
            $insertboleta="INSERT INTO boleta (empleado,fecha,fechaentrega,idcliente,total,estadocomprobante) VALUES ('$empleado','$fecha','$fechaentrega','$idcliente','$total','$estadocomprobante')";
            $resultado = mysqli_query($this->conectar(),$insertboleta);

            $insertdetalleboleta="INSERT INTO detalleboleta (idboleta,idproducto,cantidad,precio) VALUES ";
                foreach ($fila as $res){
                    $idproforma=$res['idproforma'];
                    $idproducto=$res['idproducto'];
                    $cantidad=$res['cantidad'];
                    $precio=$res['precio'];
                     $insertdetalleboleta=$insertdetalleboleta."('$idproforma','$idproducto','$cantidad','$precio'),";
                }
                $insertdetalleboleta=substr($insertdetalleboleta, 0, -1);
            $resultado = mysqli_query($this->conectar(),$insertdetalleboleta);

            $updateestado="UPDATE proforma SET estadocomprobante=0 WHERE idproforma='$idproforma'";
            $resultado = mysqli_query($this->conectar(),$updateestado);
            $this->desconectar();
        }
         
        function boletasentreFechas($fechaInicial,$fechaFinal)
        {
            $query = "select * from boleta where fecha between '".$fechaInicial."' and '".$fechaFinal."'";

            $resultado = mysqli_query($this->conectar(),$query);
			$this->desconectar();
			return $resultado;
            
        }


	} 
 ?>