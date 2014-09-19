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
	$.post("../Logica/ScriptsPHP/requestEstadoArticulo.php",{nproceso: nproceso}, responseReportData);	
	return false;
}

function responseReportData(data)
{
	var array = new Array();
	var estadoArticulo = new Array();
	array = $.parseJSON(data);
	
	estadoArticulo = array['estadoArticulo'];
	
	$('#tablaEstadoArticulo').append('<table class="table table-hover"><thead><tr><th>ID</th><th>Nombre Estado Articulo</th><th>Activo</th></thead></tr><tbody id = "tbody">');
	
	for(i = 0; i < estadoArticulo.length; i++)
	{
		$('#tbody').append('<tr id = "row'+i+'">');
		$('#row'+i).append('<td>'+estadoArticulo[i].id_estado+'</td>');
		$('#row'+i).append('<td>'+estadoArticulo[i].nombre+'</td>');
		$('#row'+i).append('<td>'+((estadoArticulo[i].activo == 1)?"activo":"inactivo")+'</td>');
	}
	$('#tablaEstadoArticulo').append('</table>');
	
}

