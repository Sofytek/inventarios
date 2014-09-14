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
	$.post("../logica/ScriptsPHP/requestSeccion.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var seccion = new Array();
	var dependencia = new Array();
	array = $.parseJSON(data);
	
	seccion = array['seccion'];
	dependencia = array['dependencia'];
	
	$('#tablaSecciones').append('<table class="table table-hover"><thead><tr><th>ID</th><th>Nombre Seccion</th><th>Activo</th><th>Dependencia</th><th>Direccion</th><th>Telefono</th><th>Bodega</th><th>C.C. Responsable</th></thead></tr><tbody id = "tbody">');
	
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
	}
	$('#tablaSecciones').append('</table>');
	
}

