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

	$.post("../Logica/ScriptsPHP/marcaEmpresa.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var marca = new Array();
	array = $.parseJSON(data);
	
	marca = array['marca'];
	
	$('#tablaMarcas').append('<table class="table table-hover" id = "tabla"><thead><tr><th>ID</th><th>Nombre Marca</th><th>Activo</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < marca.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+marca[i].idmarca+'</td>');
		$('#row'+i).append('<td>'+marca[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((marca[i].activo == 1)?"activo":"inactivo")+'</td>');
		$('#row'+i).append('<td><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "prepareModificar('+marca[i].idmarca+')"></td>');
	
	}
	$('#tablaMarcas').append('</table>');
	
}

function prepareModificar(idmarca)
{
	var nproceso = 4;
	$.post("../Logica/ScriptsPHP/requestMarca.php",{nproceso: nproceso, id: idmarca}, responseModifieData);	
	return false;
}

function responseModifieData(datos)
{
	array = new Array();
	marca = new Array();
	
	array = $.parseJSON(datos);
	marca = array['marca'];
	
	$('#tabla').remove();
	$('#tablaMarcas').append('<form class="form-horizontal" id = form>');
	$('#form').append('<fieldset id = fieldset>');
	$('#fieldset').append('<legend>Modificar una Marca</legend>');
	$('#fieldset').append('<div class="control-group" id = "div1">');
	$('#div1').append('<label class="control-label" for="nombreEmpresa">Nombre </label>');
	$('#div1').append('<div class="controls" id = "div1_1">');
	$('#div1_1').append('<input id="marca" name="marca" type="text" value = "'+marca[1]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="checkbox" id = "chkbx">');
	$('#chkbx').append('<label for="checkboxes-0" id = chkbxlabel>');
	$('#chkbxlabel').append('<input name="activo" id="activo" type="checkbox" value="'+parseInt(marca[2])+'">Activo');
	$('#tablaMarcas').append('<div class="control-group"><label class="control-label" for="botonModificarMarca"></label><div class="controls"><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "modificarMarca('+marca[0]+')">');		
	
}

function modificarMarca(idmarca)
{
	var nproceso = 5;
	var marca = $("#marca").val();
  	var activo = $("#activo").prop("checked");

  	if(activo == true)
  	{
  		activo = 1;
  	}
  	else if(activo == false)
  	{
  		activo = 0;
  	}

  	var JSON = $.parseJSON('{"idmarca":'+parseInt(idmarca)+', "nombre":"'+marca+'", "activo":'+activo+'}'); 
  
 	$.post("../Logica/ScriptsPHP/requestMarca.php",{Json:JSON, nproceso: nproceso}, responseModificarLinea); 
  	return false;
}

function responseModificarLinea(data)
{
	if(data == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La marca ha sido Modificada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La marca no ha sido modificada");
		//document.write(data);

	}
	
}

function redireccionar()
{
	location.href = "consultaMarca.html";	
}
