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

	$.post("../Logica/ScriptsPHP/requestDependencia.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var dependencia = new Array();
	var empresa = new Array();
	array = $.parseJSON(data);
	
	empresa = array['empresa'];
	dependencia = array['dependencia'];
	
	$('#tablaDependencias').append('<table class="table table-hover" id = "tabla"><thead><tr><th>ID</th><th>Nombre Dependencia</th><th>Activo</th><th>Empresa</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < dependencia.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+dependencia[i].iddependencia+'</td>');
		$('#row'+i).append('<td>'+dependencia[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((dependencia[i].activo == 1)?"activo":"inactivo")+'</td>');
		$('#row'+i).append('<td>'+empresa[parseInt(dependencia[i].idempresa)]+'</td>');
		$('#row'+i).append('<td><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "prepareModificar('+dependencia[i].iddependencia+')"></td>');
	
	}
	$('#tablaDependencias').append('</table>');
	
}

function prepareModificar(iddependencia)
{
	var nproceso = 4;
	$.post("../Logica/ScriptsPHP/requestDependencia.php",{nproceso: nproceso, id: iddependencia}, responseModifieData);	
	return false;
}

function responseModifieData(datos)
{
	array = new Array();
	dependencia = new Array();
	empresa = new Array();
	
	array = $.parseJSON(datos);
	dependencia = array['dependencia'];
	empresa = array['empresa'];
	
	$('#tabla').remove();
	$('#tablaDependencias').append('<form class="form-horizontal" id = form>');
	$('#form').append('<fieldset id = fieldset>');
	$('#fieldset').append('<legend>Modificar una Dependencia</legend>');
	$('#fieldset').append('<div class="control-group" id = "div1">');
	$('#div1').append('<label class="control-label" for="nombreDependencia">Nombre </label>');
	$('#div1').append('<div class="controls" id = "div1_1">');
	$('#div1_1').append('<input id="dependencia" name="dependencia" type="text" value = "'+dependencia[1]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="checkbox" id = "chkbx">');
	$('#chkbx').append('<label for="checkboxes-0" id = chkbxlabel>');
	$('#chkbxlabel').append('<input name="activo" id="activo" type="checkbox" value="'+parseInt(dependencia[2])+'">Activo');
	$('#fieldset').append('<div class="row"><div class="control-group"><div class="col-xs-3"><label class="control-label" for="Empresa">Empresa</label><div id = "Aempresa"class="controls">');
	$('#Aempresa').append('<select class="form-control" id = "empresa" class="input-xlarge">');
	for(i = 0; i < empresa.length; i++)
	{
		//if(empresa[i].activo == 1)
		{
			if(empresa[i].idempresa == dependencia[3])
			{
				$('#empresa').append('<option selected="selected" value = '+empresa[i].idempresa+'>'+empresa[i].nombre+'</option>');
			}
			$('#empresa').append('<option value = '+empresa[i].idempresa+'>'+empresa[i].nombre+'</option>');	
		}
	}
	$('#tablaDependencias').append('<div class="control-group"><label class="control-label" for="botonModificarDependencia"></label><div class="controls"><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "modificarDependencia('+dependencia[0]+')">');		
	
}

function modificarDependencia(iddependencia)
{
	var nproceso = 5;
	var d = $("#dependencia").val();
  	var a = $("#activo").prop("checked");
  	var e = $("#empresa").val();
  
  	if(a == true)
  	{
  		a = 1;
  	}
  	else if(a == false)
  	{
  		a = 0;
  	}

  	var JSON = $.parseJSON('{"iddependencia":'+parseInt(iddependencia)+', "nombre":"'+d+'", "activo":'+a+', "idempresa":'+e+'}'); 
  
 	$.post("../Logica/ScriptsPHP/requestDependencia.php",{Json:JSON, nproceso: nproceso}, responseModificarDependencia); 
  	return false;
}

function responseModificarDependencia(data)
{
	if(data == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La dependencia ha sido Modificada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La dependencia no ha sido modificada");
	}
	
}

function redireccionar()
{
	location.href = "consultaDependencia.html";	
}
