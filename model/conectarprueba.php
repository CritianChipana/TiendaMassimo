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
class EntidadBuscarComprobante extends conexion{
    // $cn2="";
    // public function EntidadBuscarComprobante(){
    //     $this-> conectar();        
    // }

    public function validadComprobante(){
        // $cn = mysqli_connect('localhost','root','12345678','comprobante');
        // if (!$cn) {
        //     die("Error en conexion " . mysqli_connect_error());
        // }
        $sql = "SELECT * FROM boleta WHERE id=14 ";
        $comprobante = mysqli_query($this->conectar(),$sql);
        $this->desconectar();
        $filas = mysqli_num_rows($comprobante);
        if($filas!=0){
             echo 1;
        }else{
            echo 0;
        }
    }
}

$a = new EntidadBuscarComprobante();
$a->validadComprobante();

?>




<h1>_______________________________________</h1>


<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "comprobante";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Error en conexion " . mysqli_connect_error());
}


$sql2 = "SELECT * FROM boleta where id=1";
$result = mysqli_query($conn, $sql2);
// $array = mysqli_fetch_array($result); // es para convertirllo en un arreglo
if(mysqli_num_rows($result)>0){


?>
<tbody>
<?php 
    foreach ($result as $row){  ?>
   <tr>
       <td><?php echo $row['id']; ?></td>
       <td><?php echo $row['nombre']; ?></td>
       <td><?php echo $row['apellido']; ?></td>
       <td><?php echo $row['estado']; ?></td>

   </tr>
   <?php } ?>
</tbody>

<?php
}

?>