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
	$.post("../logica/ScriptsPHP/requestDependencia.php",{nproceso: nproceso}, responseReportData);	
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
	
	$('#tablaDependencias').append('<table class="table table-hover"><thead><tr><th>ID</th><th>Nombre Dependencia</th><th>Activo</th><th>Empresa</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < dependencia.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+dependencia[i].iddependencia+'</td>');
		$('#row'+i).append('<td>'+dependencia[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((dependencia[i].activo == 1)?"activo":"inactivo")+'</td>');
		$('#row'+i).append('<td>'+empresa[parseInt(dependencia[i].idempresa)]+'</td>');
	}
	$('#tablaDependencias').append('</table>');
	
}
