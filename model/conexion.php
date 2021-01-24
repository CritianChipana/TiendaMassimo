<?php



class conexion{

    public function conectar(){
        $cn = mysqli_connect('localhost','root','12345678','comprobante');
        return $cn;
    }

    protected function desconectar(){
        return mysqli_close($this->conectar());
    }

}

?>



