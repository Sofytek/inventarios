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
	
	$('#tablaEmpresas').append('<table class="table table-hover"><thead><tr><th>ID</th><th>Nombre Empresa</th><th>Activo</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < empresa.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+empresa[i].idempresa+'</td>');
		$('#row'+i).append('<td>'+empresa[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((empresa[i].activo == 1)?"activo":"inactivo")+'</td>');
	}
	$('#tablaEmpresas').append('</table>');
	
}
