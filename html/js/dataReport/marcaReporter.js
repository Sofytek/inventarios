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

	$.post("../Logica/ScriptsPHP/requestMarca.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var marca = new Array();
	array = $.parseJSON(data);
	
	marca = array['marca'];
	
	$('#tablaMarcas').append('<table class="table table-hover"><thead><tr><th>ID</th><th>Nombre Marca</th><th>Activo</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < marca.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+marca[i].idmarca+'</td>');
		$('#row'+i).append('<td>'+marca[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((empresa[i].activo == 1)?"activo":"inactivo")+'</td>');
	}
	$('#tablaMarcas').append('</table>');
	
}
