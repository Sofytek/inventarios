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

	$.post("../Logica/ScriptsPHP/requestLinea.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var linea = new Array();
	array = $.parseJSON(data);
	
	linea = array['linea'];
	
	$('#tablaLineas').append('<table class="table table-hover" id = "tabla"><thead><tr><th>ID</th><th>Nombre Lineas</th><th>Activo</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < linea.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+linea[i].idlinea+'</td>');
		$('#row'+i).append('<td>'+linea[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((linea[i].activo == 1)?"activo":"inactivo")+'</td>');
		$('#row'+i).append('<td><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "prepareModificar('+linea[i].idlinea+')"></td>');
	
	}
	$('#tablaLineas').append('</table>');
	
}

function prepareModificar(idlinea)
{
	var nproceso = 4;
	$.post("../Logica/ScriptsPHP/requestLinea.php",{nproceso: nproceso, id: idlinea}, responseModifieData);	
	return false;
}

function responseModifieData(datos)
{
	array = new Array();
	linea = new Array();
	
	array = $.parseJSON(datos);
	linea = array['linea'];
	
	$('#tabla').remove();
	$('#tablaLineas').append('<form class="form-horizontal" id = form>');
	$('#form').append('<fieldset id = fieldset>');
	$('#fieldset').append('<legend>Modificar una Linea</legend>');
	$('#fieldset').append('<div class="control-group" id = "div1">');
	$('#div1').append('<label class="control-label" for="nombreLinea">Nombre </label>');
	$('#div1').append('<div class="controls" id = "div1_1">');
	$('#div1_1').append('<input id="linea" name="linea" type="text" value = "'+linea[1]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="checkbox" id = "chkbx">');
	$('#chkbx').append('<label for="checkboxes-0" id = chkbxlabel>');
	$('#chkbxlabel').append('<input name="activo" id="activo" type="checkbox" value="'+parseInt(linea[2])+'">Activo');
	$('#tablaLineas').append('<div class="control-group"><label class="control-label" for="botonModificarLinea"></label><div class="controls"><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "modificarLinea('+linea[0]+')">');		
	
}

function modificarLinea(idlinea)
{
	var nproceso = 5;
	var linea = $("#linea").val();
  	var activo = $("#activo").prop("checked");

  	if(activo == true)
  	{
  		activo = 1;
  	}
  	else if(activo == false)
  	{
  		activo = 0;
  	}

  	var JSON = $.parseJSON('{"idlinea":'+parseInt(idlinea)+', "nombre":"'+linea+'", "activo":'+activo+'}'); 
  
 	$.post("../Logica/ScriptsPHP/requestLinea.php",{Json:JSON, nproceso: nproceso}, responseModificarLinea); 
  	return false;
}

function responseModificarLinea(data)
{
	if(data == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La Linea ha sido Modificada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La Linea no ha sido modificada");
		//document.write(data);

	}
	
}

function redireccionar()
{
	location.href = "consultaLinea.html";	
}
