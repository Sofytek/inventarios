/**
 * @author User
 */
prepareData();
var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarSeccion");
  x.click(pressButton);
}

function pressButton()
{
 
  var seccion = $("#seccion").val();
  var activo = $("#activo").prop("checked");
  var dependencia = $("#dependencia").val();
  var direccion = $("#direccion").val();
  var telefono = $("#telefono").val();
  var bodega = $("#bodega").val();
  var ccAdmin = $("#cc_admin").val();
  
  if(activo == true)
  {
  	activo = 1;
  }
  else if(activo == false)
  {
  	activo = 0;
  }

  var JSON = $.parseJSON('{"idseccion":0, "nombre":"'+seccion+'", "activo":'+activo+', "iddependencia":'+dependencia+', "direccion":"'+direccion+'", "telefono":"'+telefono+'", "bodega":"'+bodega+'", "cc_admin":'+ccAdmin+'}'); 
  var nproceso = 1; 
  
  $.post("../logica/ScriptsPHP/requestSeccion.php",{Json:JSON, nproceso: nproceso}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La Seccion ha sido agregada");
	}
	else
	{
		//setTimeout ("redireccionar()", 2000);
		//alert("La Seccion no ha sido agregada");
		document.write(bandera);
	}
	
}

function redireccionar()
{
	location.href = "main.html";	
}

function prepareData()
{
	var nproceso = 3;
	$.post("../logica/ScriptsPHP/requestSeccion.php",{nproceso: nproceso}, responsePrepareData);	
	return false;
}

function responsePrepareData(data)
{
	var array = new Array();
	array = $.parseJSON(data);
	$('#DDependencia').append('<select class="form-control" id = "dependencia" class="input-xlarge">');
	for(i = 0; i < array.length; i++)
	{
		if(array[i].activo == 1)
		{
			$('#dependencia').append('<option value = '+array[i].iddependencia+'>'+array[i].nombre+'</option>');	
		}
	}	
}