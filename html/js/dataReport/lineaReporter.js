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

	$.post("../Logica/ScriptsPHP/requestLinea.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var linea = new Array();
	array = $.parseJSON(data);
	
	linea = array['linea'];
	
	$('#tablaLineas').append('<table class="table table-hover"><thead><tr><th>ID</th><th>Nombre Linea</th><th>Activo</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < linea.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+linea[i].idlinea+'</td>');
		$('#row'+i).append('<td>'+linea[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((linea[i].activo == 1)?"activo":"inactivo")+'</td>');
	}
	$('#tablaLineas').append('</table>');
	
}
