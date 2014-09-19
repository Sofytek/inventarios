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
	
	$('#tablaUsuarios').append('<table class="table table-hover"><thead><tr><th>ID</th><th>Nombres</th><th>Apellidos</th><th>Cedula</th><th>Direccion</th><th>Ciudad</th><th>Telefono</th><th>Correo</th><th>Usuario</th><th>Seccion</th></thead></tr><tbody id = "tbody">');
	
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
	}
	$('#tablaSecciones').append('</table>');
	
}

