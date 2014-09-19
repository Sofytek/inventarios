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
	
	$('#tablaSublineas').append('<table class="table table-hover"><thead><tr><th>ID</th><th>Nombre Sublinea</th><th>Activo</th><th>Linea</th></tr></thead><tbody id = "tbody">');
	
	for(i = 0; i < sublinea.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+sublinea[i].idslinea+'</td>');
		$('#row'+i).append('<td>'+sublinea[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((sublinea[i].activo == 1)?"activo":"inactivo")+'</td>');
		$('#row'+i).append('<td>'+linea[parseInt(sublinea[i].idlinea)]+'</td>');
	}
	$('#tablaSublineas').append('</table>');
	
}