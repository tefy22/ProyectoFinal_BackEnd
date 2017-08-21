<?php 
	
	$archivo= file_get_contents('data-1.json');
	$casas= json_decode($archivo);

	try {
		foreach ($casas as $key => $value) {
	?>
	
	<div class='itemMostrado tituloContenido'>
		<div class='row'>
			<img src='img/home.jpg'/>
		<div class='col l7 card-stacked'>
			<span class='card-action'>Direccion: <b><?php echo $value->Direccion ?></b></span><br>
			<span class='card-action'>Ciudad: <b><?php echo $value->Ciudad ?></b></span><br>
			<span class='card-action'>Telefono: <b><?php echo $value->Telefono ?></b></span><br>
			<span class='card-action'>Codigo Postal: <b><?php echo $value->Codigo_Postal ?></b></span><br>
			<span class='card-action'>Tipo: <b><?php echo $value->Tipo ?></b></span><br>
			<span class='card-action precioTexto'>Precio: <b><?php echo $value->Precio ?></b></span><br><br><br>
			<span class='card-action'>VER MAS</span><br>
		</div>
		</div>
	</div>
<?php
	
		}
		
	} catch (Exception $e) {
		echo $e->getMessage();
	}

?>