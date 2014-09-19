/**
 * @author User
 */
reportData();
var x;
x=$(document);
x.ready(events);

function reportData()
{
	var nproceso = 2;

	$.post("../Logica/ScriptsPHP/requestEstadoArticulo.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var estadoArticulo = new Array();
	array = $.parseJSON(data);
	
	estadoArticulo = array['estadoArticulo'];
	
	$('#tablaEstadoArticulo').append('<table class="table table-hover" id = "tabla"><thead><tr><th>ID</th><th>Nombre Estado Articulo</th><th>Activo</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < estadoArticulo.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+estadoArticulo[i].id_estado+'</td>');
		$('#row'+i).append('<td>'+estadoArticulo[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((estadoArticulo[i].activo == 1)?"activo":"inactivo")+'</td>');
		$('#row'+i).append('<td><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "prepareModificar('+estadoArticulo[i].id_estado+')"></td>');
	
	}
	$('#tablaEstadoArticulo').append('</table>');
	
}

function prepareModificar(id_estado)
{
	var nproceso = 4;
	$.post("../Logica/ScriptsPHP/requestEstadoArticulo.php",{nproceso: nproceso, id: id_estado}, responseModifieData);	
	return false;
}

function responseModifieData(datos)
{
	array = new Array();
	estadoArticulo = new Array();
	
	array = $.parseJSON(datos);
	estadoArticulo = array['estadoArticulo'];
	
	$('#tabla').remove();
	$('#tablaEstadoArticulo').append('<form class="form-horizontal" id = form>');
	$('#form').append('<fieldset id = fieldset>');
	$('#fieldset').append('<legend>Modificar un Estado Articulo</legend>');
	$('#fieldset').append('<div class="control-group" id = "div1">');
	$('#div1').append('<label class="control-label" for="nombreEstado">Nombre </label>');
	$('#div1').append('<div class="controls" id = "div1_1">');
	$('#div1_1').append('<input id="estadoArticulo" name="estadoArticulo" type="text" value = "'+estadoArticulo[1]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="checkbox" id = "chkbx">');
	$('#chkbx').append('<label for="checkboxes-0" id = chkbxlabel>');
	$('#chkbxlabel').append('<input name="activo" id="activo" type="checkbox" value="'+parseInt(estadoArticulo[2])+'">Activo');
	
	$('#tablaEstadoArticulo').append('<div class="control-group"><label class="control-label" for="botonModificarEstadoArticulo"></label><div class="controls"><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "modificarEstadoArticulo('+estadoArticulo[0]+')">');		
	
}
 
function modificarEstadoArticulo(id_estado)
{
	var nproceso = 5;
	var estadoArticulo = $("#estadoArticulo").val();
  	var activo = $("#activo").prop("checked");
  
  	if(activo == true)
  	{
  		activo = 1;
  	}
  	else if(activo == false)
  	{
  		activo = 0;
  	}
  	
  	var JSON = $.parseJSON('{"id_estado":'+parseInt(id_estado)+', "nombre":"'+estadoArticulo+'", "activo":'+activo+'}'); 
  
 	$.post("../Logica/ScriptsPHP/requestEstadoArticulo.php",{Json:JSON, nproceso: nproceso}, responseModificarEstadoArticulo); 
  	return false;
}

function responseModificarEstadoArticulo(data)
{
	if(data == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("El estado articulo ha sido Modificado");
	}
	else
	{
		//setTimeout ("redireccionar()", 2000);
		//alert("El estado articulo no ha sido agregado");
		document.write(data);
	}
	
}

function redireccionar()
{
	location.href = "consultaEstadoArticulo.html";	
}

