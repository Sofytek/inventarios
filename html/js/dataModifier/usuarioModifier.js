/**
 * @author User
 */

reportData();

function reportData()
{
	var nproceso = 2;
	$.post("../Logica/ScriptsPHP/requestUsuario.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var usuario = new Array();
	var seccion = new Array();
	array = $.parseJSON(data);
	
	usuario = array['usuario'];
	seccion = array['seccion'];
	
	$('#tablaUsuarios').append('<table id = "tabla" class="table table-hover"><thead><tr><th>ID</th><th>Nombres</th><th>Apellidos</th><th>Cedula</th><th>Direccion</th><th>Ciudad</th><th>Telefono</th><th>Correo</th><th>Usuario</th><th>Seccion</th></thead></tr><tbody id = "tbody">');
	
	for(i = 0; i < usuario.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+usuario[i].idusuario+'</td>');
		$('#row'+i).append('<td>'+usuario[i].nombres+'</td>');
		$('#row'+i).append('<td>'+usuario[i].apellidos+'</td>');
		$('#row'+i).append('<td>'+usuario[i].cc+'</td>');
		$('#row'+i).append('<td>'+usuario[i].direccion+'</td>');
		$('#row'+i).append('<td>'+usuario[i].ciudad+'</td>');
		$('#row'+i).append('<td>'+usuario[i].telefono+'</td>');
		$('#row'+i).append('<td>'+usuario[i].correo+'</td>');
		$('#row'+i).append('<td>'+usuario[i].usuario+'</td>');
		$('#row'+i).append('<td>'+seccion[parseInt(usuario[i].idseccion_secciones)]+'</td>');
		$('#row'+i).append('<td><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "prepareModificar('+usuario[i].idusuario+')"></td>');
	}
	$('#tablaUsuarios').append('</table>');
	
}

function prepareModificar(idusuario)
{
	var nproceso = 4;
	$.post("../Logica/ScriptsPHP/requestUsuario.php",{nproceso: nproceso, idusuario: idusuario}, responsePrepareModificar);	
	return false;
}

function responsePrepareModificar(data)
{
	array = new Array();
	usuario = new Array();
	dependencias = new Array();
	secciones = new Array();
	
	array = $.parseJSON(data);
	usuario = array['usuario'];
	dependencias = array['dependencias'];
	secciones = array['secciones'];
	
	$('#tabla').remove();
	$('#tablaUsuarios').append('<div class="col-md-4"><form class="form-horizontal" id="formularioUsuario">');
	$('#formularioUsuario').append('<fieldset id = "fieldset">');
	$('#fieldset').append('<legend>Modificar un usuario</legend>');
	$('#fieldset').append('<div class="control-group"><label class="control-label" for="ID">ID </label><div class="controls" id = "div0">');
	$('#div0').append('<input id="idusuario" name="idusuario" type="text" value = "'+usuario[0]+'" class="input-xlarge" disabled>');
	$('#fieldset').append('<div class="control-group"><label class="control-label" for="nombresUsuario">Nombres </label><div class="controls" id = "div1">');
	$('#div1').append('<input id="nombres" name="nombres" type="text" value = "'+usuario[1]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="control-group"><label class="control-label" for="apellidosUsuario">apellidos </label><div class="controls" id = "div2">');
	$('#div2').append('<input id="apellidos" name="apellidos" type="text" value = "'+usuario[2]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="control-group"><label class="control-label" for="cedulaUsuario">Cedula </label><div id = "div3" class="controls">');
	$('#div3').append('<input id="cc" name="cc" type="text" value = "'+usuario[6]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="control-group"><label class="control-label" for="direccionUsuario">Direccion </label><div id = "div4" class="controls">');
	$('#div4').append('<input id="direccion" name="direccion" type="text" value = "'+usuario[7]+'" class="input-xlarge" required="">');	
	$('#fieldset').append('<div class="control-group"><label class="control-label" for="ciudadUsuario">Ciudad </label><div id = "div5" class="controls">');
	$('#div5').append('<input id="ciudad" name="ciudad" type="text" value = "'+usuario[8]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="control-group"><label class="control-label" for="telefonoUsuario">Telefono </label><div id = "div6" class="controls">');
	$('#div6').append('<input id="telefono" name="telefono" type="text" value = "'+usuario[9]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="control-group"><label class="control-label" for="correoUsuario">Correo </label><div id = "div7" class="controls">');
	$('#div7').append('<input id="correo" name="correo" type="text" value = "'+usuario[4]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="control-group"><label class="control-label" for="usuario">Usuario</label><div id = "div8" class="controls">');
	$('#div8').append('<input id="usuario" name="usuario" type="text" value = "'+usuario[3]+'" class="input-xlarge" required="">');
	$('#fieldset').append('<div class="row"><div class="control-group"><div class="col-xs-6"><label class="control-label" for="Dependencia">Dependencia</label><div class="controls" id = "dependencia">');
	$('#dependencia').append('<select class="form-control" name = "iddependencia" id = "iddependencia" class="input-xlarge">');	
	for(i = 0; i < dependencias.length; i++)
	{
		$('#iddependencia').append('<option value = "'+dependencias[i].idseccion+'">'+dependencias[i].nombre+'</option>');
	}
	
	$('#fieldset').append('<div class="row"><div class="control-group"><div class="col-xs-6"><label class="control-label" for="seccion">Seccion</label><div class="controls" id = "seccion">');
	$('#seccion').append('<select class="form-control" name = "idseccion" id = "idseccion" class="input-xlarge">');
	for(i = 0; i < secciones.length; i++)
	{
		if(secciones[i].iddependencia == usuario[14])
			{
				$('#idseccion').append('<option selected="selected" value = '+secciones[i].idseccion+'>'+secciones[i].nombre+'</option>');
			}
		$('#idseccion').append('<option value = "'+secciones[i].idseccion+'">'+secciones[i].nombre+'</option>');
	}
	
	$('#fieldset').append('<div class="checkbox"><label for="checkboxes-0"><input name="activo" id="activo" value="1" type="checkbox">Activo');
	
	$('#tablaUsuarios').append('<div class="control-group"><label class="control-label" for="botonModificarUsuario"></label><div class="controls"><input type = "submit" class="btn btn-primary" value="Modificar" onclick = "modificarUsuario()">');	
}

function modificarUsuario()
{
	var nproceso = 5;
	$('#idusuario').prop('disabled', false);
	JSON = $('#formularioUsuario').serializeJSON();
	$.post("../Logica/ScriptsPHP/requestUsuario.php",{nproceso: nproceso, Json: JSON}, responseModificarUsuario);	
	return false;	
}

function responseModificarUsuario(data)
{
	if(data == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("El usuario ha sido modificado");
	}
	else
	{
		document.write(data);
	}
	
}

function redireccionar()
{
	location.href = "consultaUsuario.html";	
}
