<?php 
 	class nav{
 	public function navShow($listaPrivilegios){
 	?>
		<link rel="stylesheet" type="text/css" href="../public/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="../public/css/nav.css"> 
 	    <div class="global-fixed">
	       <header class="header1">
	        <div class="headerdiv">
	          <div class="nombre">
	            <a href="principal.php">
	              <span>RESTAURANT</span>
	              <span class="color-logo"> MASSIMO</span>  
	            </a>
	          </div>
	          <div class="informacion">
	            <span>
	             <?php   date_default_timezone_set("America/Lima"); echo date("d") . " del " . date("m") . " del " . date("Y"); ?>
	            </span> <span>|</span>
	            <span ><?php echo  $listaPrivilegios[0]['nombre'] ." ". $listaPrivilegios[0]['apellidos'];?></span>
	            <a href="../index.php"><img class="imgsalir" src="../public/img/salir.png" alt="Salir del sistema" title="Salir"></a>
	          </div>
	        </div>
	      </header> 
	    </div> 
	    <div class="nav-bg">
	      <nav class="navegacion-principal contenedor">
	          <a href="miperfil.php">Mi Perfil</a>
	          <?php
	          $numero = count($listaPrivilegios);
	          for($i = 0; $i < $numero; $i++){
	          ?>
	          <a class="principal" href="<?php echo $listaPrivilegios[$i]['link']."?idbtn=".$listaPrivilegios[$i]['idprivilegio']."&dni=".$listaPrivilegios[$i]['DNI']; ?>"><?php echo $listaPrivilegios[$i]['nombrep']; ?></a>
	          <?php
	          }
	          ?>
	      </nav>    
	    </div> 	
 	<?php	
 	}
 }
 ?>