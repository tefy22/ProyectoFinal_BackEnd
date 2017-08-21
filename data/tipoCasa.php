<?php  

try {
	$archivo= file_get_contents('data-1.json');//transmite el contenido de un fichero a cadena
	$datos= json_decode($archivo);//convierte un string codigicado en json a una variable php
	$tipoHome=[];

	foreach ($datos as $key=>$value) {
		$tipoHome[]= $value->Tipo; //extrae solo el tipo de casa
	}
	$tipoHome= array_unique($tipoHome);//elimina datos repetidos
	$listaHome="";

	foreach ($tipoHome as $tipo) {
		$listaHome .= "<option \"$tipo\">$tipo</option>";
	}
	echo $listaHome;

} catch (Exception $e) {
	echo $e->getMessage();
}

?>