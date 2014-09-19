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

	$.post("../Logica/ScriptsPHP/requestSublinea.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var sublinea = new Array();
	var linea = new Array();
	array = $.parseJSON(data);
	
	linea = array['linea'];
	sublinea = array['sublinea'];
	
	$('#tablaSublineas').append('<table class="table table-hover" id = "tabla"><thead><tr><th>ID</th><th>Nombre Sublinea</th><th>Activo</th><th>Linea</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < sublinea.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+sublinea[i].idslinea+'</td>');
		$('#row'+i).append('<td>'+sublinea[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((sublinea[i].activo == 1)?"activo":"inactivo")+'</td>');
		$('#row'+i).append('<td>'+linea[parseInt(sublinea[i].idlinea)]+'</td>');
		$('#row'+i).append('<td><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "prepareModificar('+sublinea[i].idslinea+')"></td>');
	
	}
	$('#tablaSublineas').append('</table>');
	
}

function prepareModificar(idslinea)
{
	var nproceso = 4;
	$.post("../Logica/ScriptsPHP/requestSublinea.php",{nproceso: nproceso, id: idslinea}, responseModifieData);	
	return false;
}

function responseModifieData(datos)
{
	array = new Array();
	sublinea = new Array();
	linea = new Array();
	
	array = $.parseJSON(datos);
	sublinea = array['sublinea'];
	linea = array['linea'];
	
	$('#tabla').remove();
	$('#tablaSublineas').append('<form class="form-horizontal" id = form>');
	$('#form').append('<fieldset id = fieldset>');
	$('#fieldset').append('<legend>Modificar una Sublinea</legend>');
	$('#fieldset').append('<div class="control-group" id = "div1">');
	$('#div1').append('<label class="control-label" for="nombreSublinea">Nombre </label>');
	$('#div1').append('<div class="controls" id = "div1_1">');
	$('#div1_1').append('<input id="sublinea" name="sublinea" type="text" value = "'+sublinea[1]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="checkbox" id = "chkbx">');
	$('#chkbx').append('<label for="checkboxes-0" id = chkbxlabel>');
	$('#chkbxlabel').append('<input name="activo" id="activo" type="checkbox" value="'+parseInt(sublinea[2])+'">Activo');
	$('#fieldset').append('<div class="row"><div class="control-group"><div class="col-xs-3"><label class="control-label" for="Linea">Linea</label><div id = "Alinea"class="controls">');
	$('#Alinea').append('<select class="form-control" id = "linea" class="input-xlarge">');
	for(i = 0; i < linea.length; i++)
	{

		{
			if(linea[i].idlinea == sublinea[3])
			{
				$('#linea').append('<option selected="selected" value = '+linea[i].idlinea+'>'+linea[i].nombre+'</option>');
			}
			$('#linea').append('<option value = '+linea[i].idlinea+'>'+linea[i].nombre+'</option>');	
		}
	}
	$('#tablaSublineas').append('<div class="control-group"><label class="control-label" for="botonModificarSublinea"></label><div class="controls"><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "modificarSublinea('+sublinea[0]+')">');		
	
}

function modificarSublinea(idslinea)
{
	var nproceso = 5;
	var sublinea = $("#sublinea").val();
  	var activo = $("#activo").prop("checked");
  	var linea = $("#linea").val();
  
  	if(activo == true)
  	{
  		activo = 1;
  	}
  	else if(activo == false)
  	{
  		activo = 0;
  	}

  	var JSON = $.parseJSON('{"idslinea":'+parseInt(idslinea)+', "nombre":"'+sublinea+'", "activo":'+activo+', "idlinea":'+linea+'}'); 
  
 	$.post("../Logica/ScriptsPHP/requestSublinea.php",{Json:JSON, nproceso: nproceso}, responseModificarSublinea); 
  	return false;
}

function responseModificarSublinea(data)
{
	if(data == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La sublinea ha sido Modificada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La sublinea no ha sido modificada");
	}
	
}

function redireccionar()
{
	location.href = "consultaSublinea.html";	
}
