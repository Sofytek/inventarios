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
	$.post("../logica/ScriptsPHP/requestSolicitud.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var solicitud = new Array();
	var dependencia = new Array();
	var usuario = new Array ();
	var seccion = new Array ();
	array = $.parseJSON(data);
	
	solicitud = array['solicitud'];
	dependencia = array['dependencia'];
	usuario = array['usuario'];
	seccion = array['seccion'];

	
	$('#tablaSolicitudes').append('<table class="table table-hover"><thead><tr><th>ID</th><th>Solicitud</th><th>Tipo</th><th>Fecha</th><th>Estado</th><th>Solicitante</th><th>Usuario</th><th>Dependencia</th><th>Seccion</th><th>Nota de Envio</th><th>Fecha de Envio</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < solicitud.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+solicitud[i].idsolicitud+'</td>');
		$('#row'+i).append('<td>'+solicitud[i].nota+'</td>');
		$('#row'+i).append('<td>'+solicitud[i].tipo+'</td>');
		$('#row'+i).append('<td>'+solicitud[i].fecha+'</td>');
		$('#row'+i).append('<td>'+solicitud[i].estado+'</td>');
		$('#row'+i).append('<td>'+solicitud[i].solicitante+'</td>');
		$('#row'+i).append('<td>'+usuario[parseInt(solicitud[i].idusuario)]+'</td>');
		$('#row'+i).append('<td>'+dependencia[parseInt(solicitud[i].iddependencia)]+'</td>');
		$('#row'+i).append('<td>'+seccion[parseInt(solicitud[i].idseccion)]+'</td>');
		$('#row'+i).append('<td>'+solicitud[i].notaenvio+'</td>');
		$('#row'+i).append('<td>'+solicitud[i].fechaenvio+'</td>');
	}
	$('#tablaSolicitudes').append('</table>');
	
}