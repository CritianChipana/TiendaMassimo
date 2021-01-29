<?php 
	class formListadoComandas{

		public function formListadoComandasShow($listadocomandas,$listaPrivilegios){
			?>
			<?php 
			include_once("../shared/nav.php");
			$nav=new nav();
			$nav->navShow($listaPrivilegios);
			var_dump($listadocomandas);
			?>
		<section class="table">
		<table border="1px">
			<thead>
				<tr>
					<th>Nr°</th>
					<th>Empleado</th>
					<th>DNI</th>
					<th>fecha</th>
					<th>Estado</th>					
					<th colspan="3">ACCION</th>
				</tr>
			</thead>
				<?php
						foreach ($listadocomandas as $key) {
						?>
						<tr>
						<td><?php echo $key['idcomanda'] ?></td>
						<td><?php echo $key['empleado'] ?></td>
						<td><?php echo $key['DNI'] ?></td>
						<td><?php echo $key['fecha'] ?></td>					
						<td><?php echo $key['estadocomprobante'] ?></td>
						<td><a class="botoasn" href="<?php echo 'formDetalleComanda.php?idcomandab='.$key['idcomanda'] ?>">BOLETA</a></td>
						<td><a class="botoasn" href="<?php echo 'formDetalleComanda.php?idcomandaf='.$key['idcomanda'] ?>">FACTURA</a></td>
						</tr>
						<?php
						}
				?>
		</table>			
		</section>

			<?php
		}
	}
 ?>