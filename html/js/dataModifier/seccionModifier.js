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

	$.post("../Logica/ScriptsPHP/requestSeccion.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var seccion = new Array();
	var dependencia = new Array();
	array = $.parseJSON(data);
	
	dependencia = array['dependencia'];
	seccion = array['seccion'];
	
	$('#tablaSecciones').append('<table class="table table-hover" id = "tabla"><thead><tr><th>ID</th><th>Nombre Seccion</th><th>Activo</th><th>Dependencia</th><th>Direccion</th><th>Telefono</th><th>Bodega</th><th>CC_Admin</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < seccion.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+seccion[i].idseccion+'</td>');
		$('#row'+i).append('<td>'+seccion[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((seccion[i].activo == 1)?"activo":"inactivo")+'</td>');
		$('#row'+i).append('<td>'+dependencia[parseInt(seccion[i].iddependencia)]+'</td>');
		$('#row'+i).append('<td>'+seccion[i].direccion+'</td>');
		$('#row'+i).append('<td>'+seccion[i].telefono+'</td>');
		$('#row'+i).append('<td>'+seccion[i].bodega+'</td>');
		$('#row'+i).append('<td>'+seccion[i].cc_admin+'</td>');
		$('#row'+i).append('<td><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "prepareModificar('+seccion[i].idseccion+')"></td>');
	
	}
	$('#tablaSecciones').append('</table>');
	
}

function prepareModificar(idseccion)
{
	var nproceso = 4;
	$.post("../Logica/ScriptsPHP/requestSeccion.php",{nproceso: nproceso, id: idseccion}, responseModifieData);	
	return false;
}

function responseModifieData(datos)
{
	array = new Array();
	seccion = new Array();
	dependencia = new Array();
	
	array = $.parseJSON(datos);
	seccion = array['seccion'];
	dependencia = array['dependencia'];
	
	$('#tabla').remove();
	$('#tablaSecciones').append('<form class="form-horizontal" id = form>');
	$('#form').append('<fieldset id = fieldset>');
	$('#fieldset').append('<legend>Modificar una Seccion</legend>');
	$('#fieldset').append('<div class="control-group" id = "div1">');
	$('#div1').append('<label class="control-label" for="nombreSeccion">Nombre </label>');
	$('#div1').append('<div class="controls" id = "div1_1">');
	$('#div1_1').append('<input id="seccion" name="seccion" type="text" value = "'+seccion[1]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="checkbox" id = "chkbx">');
	$('#chkbx').append('<label for="checkboxes-0" id = chkbxlabel>');
	$('#chkbxlabel').append('<input name="activo" id="activo" type="checkbox" value="'+parseInt(seccion[2])+'">Activo');
	$('#fieldset').append('<div class="row"><div class="control-group"><div class="col-xs-3"><label class="control-label" for="Empresa">Dependencia</label><div id = "Ddependencia"class="controls">');
	$('#Ddependencia').append('<select class="form-control" id = "dependencia" class="input-xlarge">');
	for(i = 0; i < dependencia.length; i++)
	{
		{
			if(dependencia[i].iddependencia == seccion[3])
			{
				$('#dependencia').append('<option selected="selected" value = '+dependencia[i].iddependencia+'>'+dependencia[i].nombre+'</option>');
			}
			$('#dependencia').append('<option value = '+dependencia[i].iddependencia+'>'+dependencia[i].nombre+'</option>');	
		}
	}
	$('#div1').append('<label class="control-label" for="direccion">Direccion </label>');
	$('#div1').append('<div class="controls" id = "div2_1">');
	$('#div2_1').append('<input id="direccion" name="direccion" type="text" value = "'+seccion[4]+'" class="input-xlarge" required="">');
	$('#div1').append('<label class="control-label" for="telefono">Telefono </label>');
	$('#div1').append('<div class="controls" id = "div3_1">');
	$('#div3_1').append('<input id="telefono" name="telefono" type="text" value = "'+seccion[5]+'" class="input-xlarge" required="">');
	$('#div1').append('<label class="control-label" for="bodega">Bodega </label>');
	$('#div1').append('<div class="controls" id = "div4_1">');
	$('#div4_1').append('<input id="bodega" name="bodega" type="text" value = "'+seccion[6]+'" class="input-xlarge" required="">');
	$('#div1').append('<label class="control-label" for="cc_admin">CC_Admin </label>');
	$('#div1').append('<div class="controls" id = "div5_1">');
	$('#div5_1').append('<input id="cc_admin" name="cc_admin" type="text" value = "'+seccion[7]+'" class="input-xlarge" required="">');
	
	$('#tablaSecciones').append('<div class="control-group"><label class="control-label" for="botonModificarSeccion"></label><div class="controls"><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "modificarSeccion('+seccion[0]+')">');		
	
}
 
function modificarSeccion(idseccion)
{
	var nproceso = 5;
	var seccion = $("#seccion").val();
  	var activo = $("#activo").prop("checked");
  	var dependencia = $("#dependencia").val();
  	var direccion = $("#direccion").val();
  	var telefono = $("#telefono").val();
  	var bodega = $("#bodega").val();
  	var cc_admin = $("#cc_admin").val();
  
  	if(activo == true)
  	{
  		activo = 1;
  	}
  	else if(activo == false)
  	{
  		activo = 0;
  	}
  	
  	var JSON = $.parseJSON('{"idseccion":'+parseInt(idseccion)+', "nombre":"'+seccion+'", "activo":'+activo+', "iddependencia":'+dependencia+', "direccion":"'+direccion+'","telefono":"'+telefono+'","bodega":"'+bodega+'","cc_admin":"'+cc_admin+'"}'); 
  
 	$.post("../Logica/ScriptsPHP/requestSeccion.php",{Json:JSON, nproceso: nproceso}, responseModificarSeccion); 
  	return false;
}

function responseModificarSeccion(data)
{
	if(data == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La Seccion ha sido Modificada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La Seccion no ha sido agregada");
	}
	
}

function redireccionar()
{
	location.href = "consultaSeccion.html";	
}

