/**
 * @author User
 */

var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarEstadoArticulo");
  x.click(pressButton);
}

function pressButton()
{
 
  var estadoArticulo = $("#estado").val();
  var activo = $("#activo").prop("checked");
  
  if(activo == true)
  {
  	activo = 1;
  }
  else if(a == false)
  {
  	activo = 0;
  }

  var JSON = $.parseJSON('{"id_estado":0, "nombre":"'+estadoArticulo+'", "activo":'+activo+'}'); 
  var nproceso = 1; 
  
  $.post("../Logica/ScriptsPHP/requestEstadoArticulo.php",{Json:JSON, nproceso: nproceso}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("El estado del articulo ha sido agregado");
	}
	else
	{
		//setTimeout ("redireccionar()", 2000);
		//alert("El estado del articulo no ha sido agregado");
		document.write(bandera);
	}
	
}

function redireccionar()
{
	location.href = "consultaEstadoArticulo.html";	
}
