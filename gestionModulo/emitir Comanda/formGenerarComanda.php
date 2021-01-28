<?php

class formGenerarComanda{
    
    var $dni;
    var $apellido;

    function __construct($dni,$apellido){
        $this->dni=$dni;
        $this->apellido=$apellido;
    }


    function formGenerarComandaShow($lista){
        ?>
        <P>Mesero: <?php echo "$this->apellido" ?></P>
        <P>Usuario: <?php echo "$this->dni" ?></P>
        
            <table>
                <tr>
                    <th>Platillo</th>
                    <th>Precio</th>
                    <th>cantidad</th>
                    <th>Grabar</th>
                </tr>
<hr>
        <?php
            foreach($lista as $row){
                ?>
                <form action="controlGenerarComanda.php" method="post">
                <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td><input type="number" name="cantidad" id=""></td>
                    <!-- <td><input name="a" type="submit" value="Grabar" id="<?php echo $row['idProducto'] ?>"></td> -->
                    <td><input type="checkbox" value="" name="" id=""></td>
                    
                </tr>
                </form>
                <?php
            }
        ?>
            </table>


<hr>
        <form action="" method="post">
            <label for="plato">Buscar Platillo:
                <input type="text" name="plato" id="">
            </label>
            <input type="submit" value="Buscar">
        </form>
        
        <?php
    }

}

?>
<script src="../../js/capturarid.js"></script>
