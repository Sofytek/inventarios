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

	$.post("../Logica/ScriptsPHP/requestEmpresa.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var empresa = new Array();
	array = $.parseJSON(data);
	
	empresa = array['empresa'];
	
	$('#tablaEmpresas').append('<table class="table table-hover" id = "tabla"><thead><tr><th>ID</th><th>Nombre Empresa</th><th>Activo</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < empresa.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+empresa[i].idempresa+'</td>');
		$('#row'+i).append('<td>'+empresa[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((empresa[i].activo == 1)?"activo":"inactivo")+'</td>');
		$('#row'+i).append('<td><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "prepareModificar('+empresa[i].idempresa+')"></td>');
	
	}
	$('#tablaEmpresas').append('</table>');
	
}

function prepareModificar(idempresa)
{
	var nproceso = 4;
	$.post("../Logica/ScriptsPHP/requestEmpresa.php",{nproceso: nproceso, id: idempresa}, responseModifieData);	
	return false;
}

function responseModifieData(datos)
{
	array = new Array();
	empresa = new Array();
	
	array = $.parseJSON(datos);
	empresa = array['empresa'];
	
	$('#tabla').remove();
	$('#tablaEmpresas').append('<form class="form-horizontal" id = form>');
	$('#form').append('<fieldset id = fieldset>');
	$('#fieldset').append('<legend>Modificar una Empresa</legend>');
	$('#fieldset').append('<div class="control-group" id = "div1">');
	$('#div1').append('<label class="control-label" for="nombreEmpresa">Nombre </label>');
	$('#div1').append('<div class="controls" id = "div1_1">');
	$('#div1_1').append('<input id="empresa" name="empresa" type="text" value = "'+empresa[1]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="checkbox" id = "chkbx">');
	$('#chkbx').append('<label for="checkboxes-0" id = chkbxlabel>');
	$('#chkbxlabel').append('<input name="activo" id="activo" type="checkbox" value="'+parseInt(empresa[2])+'">Activo');
	$('#tablaEmpresas').append('<div class="control-group"><label class="control-label" for="botonModificarEmpresa"></label><div class="controls"><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "modificarEmpresa('+empresa[0]+')">');		
	
}

function modificarEmpresa(idempresa)
{
	var nproceso = 5;
	var empresa = $("#empresa").val();
  	var activo = $("#activo").prop("checked");

  	if(activo == true)
  	{
  		activo = 1;
  	}
  	else if(activo == false)
  	{
  		activo = 0;
  	}

  	var JSON = $.parseJSON('{"idempresa":'+parseInt(idempresa)+', "nombre":"'+empresa+'", "activo":'+activo+'}'); 
  
 	$.post("../Logica/ScriptsPHP/requestEmpresa.php",{Json:JSON, nproceso: nproceso}, responseModificarEmpresa); 
  	return false;
}

function responseModificarEmpresa(data)
{
	if(data == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La Empresa ha sido Modificada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La empresa no ha sido modificada");
		//document.write(data);

	}
	
}

function redireccionar()
{
	location.href = "consultaEmpresa.html";	
}
