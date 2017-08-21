
//funcion para la interaccion con el back-end
function peticionAjax(urlReq, dataSubmit, controlView="contenedorDatos", load=true, callback){
  callback = callback || function(){};
  $.ajax({
    method:'POST',
    url: urlReq,
    data: dataSubmit
  })
  .done(function(rsp){
    let $control = $( "#" + controlView );
      if(load){
        $control.html( rsp );
      }
    callback(rsp, $control);
  })
  .fail(function( jqXHR, textStatus ) {
    alert( "Conexion Fallida: " + textStatus );
  });
}


$(document).ready(function () {

	var listaOpciones= function(rsp,control){$(control).append(rsp).material_select(); };
  
  peticionAjax('data/ciudades.php',{},"selectCiudad",false, listaOpciones);
  peticionAjax('data/tipoCasa.php',{},"selectTipo",false, listaOpciones);

  var contenedor= function(rsp,control){$(control).append(rsp);};
	
	$("#mostrarTodos").click((event)=>{
		peticionAjax('data/mostrarTodo.php',{},"datos",false,contenedor);
	});

	$("#formulario").submit((event)=>{ //al hacer submit en el formulario
      event.preventDefault();
      let filtroCiudad = $("#selectCiudad").val();
      let filtroTipo = $("#selectTipo").val();
      let filtroPrecioIni = $("#rangoPrecio").val().split(";")[0];
      let filtroPrecioFin = $("#rangoPrecio").val().split(";")[1];      

      peticionAjax("data/buscador.php",{fCiudad: filtroCiudad,fTipo: filtroTipo,fPrecioIni: filtroPrecioIni,
                                        fPrecioFin: filtroPrecioFin});
    });    
});


