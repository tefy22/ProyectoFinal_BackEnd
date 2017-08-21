<?php

try {

	$archivo= file_get_contents('data-1.json');//transmite el contenido de un fichero a cadena
	$datos= json_decode($archivo);//convierte un string codigicado en json a una variable php 
	$ciudades=[];

	foreach ($datos as $key=>$value) {
		$ciudades[]= $value->Ciudad; //extrae solo las ciudades
	}
	$ciudades= array_unique($ciudades);//elimina datos repetidos
	$listaCiud="";

	foreach ($ciudades as $ciudad) {
		$listaCiud .="<option value=\"$ciudad\">$ciudad</option>";
	}
	echo $listaCiud;

} catch (Exception $e) {
	echo $e->getMessage();
}

?>