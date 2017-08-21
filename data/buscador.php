<?php
$archivo= file_get_contents("data-1.json");//transmite el contenido de un fichero a cadena
$datos= json_decode($archivo);//convierte un string codigicado en json a una variable php

$filtroPrecioIni= $_POST['fPrecioIni'];
$filtroPrecioFin= $_POST['fPrecioFin'];
$filtroCiudad= $_POST['fCiudad'];
$filtroTipo= $_POST['fTipo'];
$matchPrecio;

try {
  foreach ($datos as $key=>$value) {
    $precio = str_ireplace(["$",","], "", $value->Precio);//str_ireplace devuelve un string o array ignorando mayusculas y minusculas
    $precio = intval($precio);//intval obtiene el valor entero de una variable
         
     if (($value->Ciudad==$filtroCiudad) && ($value->Tipo==$filtroTipo) && ($precio >= intval($filtroPrecioIni) 
              && $precio <= intval($filtroPrecioFin))) {
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
     }else{
        continue;
     }
  }
} catch (Exception $e) {
  echo $e->getMessage();
}

?>