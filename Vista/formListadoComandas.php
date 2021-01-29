<?php 
	class formListadoComandas{

		public function formListadoComandasShow($listadocomandas,$listaPrivilegios){
			?>
			
			<?php 
			include_once("../../shared/nav.php");
			$nav=new nav();
			$nav->mostrarNavShow($listaPrivilegios);
			var_dump($listadocomandas); 

			?>

			<?php
		}
	}
 ?>