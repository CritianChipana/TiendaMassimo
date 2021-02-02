<?php 
	include_once('../Controlador/conexion.php');
	class EntidadFactura extends conexion{

		public function listarFactura(){
			$consulta="SELECT * FROM factura";
			$resultado = mysqli_query($this->conectar(),$consulta);
			$this->desconectar();
			return $resultado;
		}
		public function agregarFacturaC($idcomanda,$ruc){ 
            
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
            $insertfactura="INSERT INTO factura (empleado,ruc,fecha,total,estadocomprobante) VALUES ( '$empleado','$ruc','$fecha','$total','$estadocomprobante')";
            $resultado = mysqli_query($this->conectar(),$insertfactura);

            $insertdetallefactura="INSERT INTO detallefactura (idfactura,idproducto,cantidad,precio) VALUES ";
                foreach ($fila as $res){
                    $idcomanda=$res['idcomanda'];
                    $idproducto=$res['idproducto'];
                    $cantidad=$res['cantidad'];
                    $precio=$res['precio'];
                     $insertdetallefactura=$insertdetallefactura."('$idcomanda','$idproducto','$cantidad','$precio'),";
                }
            $insertdetallefactura=substr($insertdetallefactura, 0, -1);
            $resultado = mysqli_query($this->conectar(),$insertdetallefactura);

           $updateestado="UPDATE comanda SET estadocomprobante=0 WHERE idcomanda='$idcomanda'";
           $resultado = mysqli_query($this->conectar(),$updateestado); 
           $this->desconectar(); 
		}
		public function agregarFacturaP($idproforma){

            $conexion = new Conexion();
            $idproforma=1;
			$consulta = "SELECT * FROM detalleProforma DC, producto PR, proforma P, usuario U WHERE DC.idproforma = '$idproforma' AND DC.idproducto=PR.idproducto AND DC.idproforma=P.idproforma AND P.dni=U.dni";
            $resultado = mysqli_query($this->conectar(),$consulta);
            $num_registros = mysqli_num_rows($resultado);
            for($i = 0; $i < $num_registros; $i++){
                $fila[$i] = mysqli_fetch_array($resultado);
            }
            $empleado=$fila[0]['nombre'];
            $ruc=$fila[0]['ruc'];
            $fecha=$fila[0]['fecha'];
            $fechaentrega=$fila[0]['fechaentrega'];
            $idcliente=$fila[0]['idcliente'];
            $total=$fila[0]['total'];
            $estadocomprobante=$fila[0]['estadocomprobante'];
            $insertfactura="INSERT INTO factura(empleado,ruc,fecha,fechaentrega,idcliente,total,estadocomprobante) VALUES ('$empleado','$ruc','$fecha','$fechaentrega','$idcliente','$total','$estadocomprobante')";
            $resultado = mysqli_query($this->conectar(),$insertfactura);

            $insertdetallefactura="INSERT INTO detallefactura (idfactura,idproducto,cantidad,precio) VALUES ";
                foreach ($fila as $res) {
                    $idproforma=$res['idproforma'];
                    $idproducto=$res['idproducto'];
                    $cantidad=$res['cantidad'];
                    $precio=$res['precio'];
                    $insertdetallefactura=$insertdetallefactura."('$idproforma','$idproducto','$cantidad','$precio'),";
                }
            $insertdetallefactura=substr($insertdetallefactura, 0, -1);
            $resultado = mysqli_query($this->conectar(),$insertdetallefactura);

            $updateestado="UPDATE proforma SET estadocomprobante=0 WHERE idproforma='$idproforma'";
            $resultado = mysqli_query($this->conectar(),$updateestado); 
            $this->desconectar();
        }
        
        function facturasEntreFechas($fechaInicial,$fechaFinal)
        {
            $query = "select * from factura where fecha between '".$fechaInicial."' and '".$fechaFinal."'";

            $resultado = mysqli_query($this->conectar(),$query);
			$this->desconectar();
			return $resultado;
        }
	}
 ?>