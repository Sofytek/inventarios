/**
 * @author Familia Villagran
 */
prepareData();
var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarEmpresa");
  x.click(pressButton);
}

function pressButton()
{
  var nproceso = 1;
  var usuario = $("#formularioUsuario").serializeJSON();
  $.post("../Logica/ScriptsPHP/requestUsuario.php",{Json:usuario, nproceso: nproceso}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("El usuario ha sido agregado");
	}
	else
	{
		document.write(bandera);
	}
	
}

function redireccionar()
{
	location.href = "main.html";	
}

function prepareData()
{
	var nproceso = 3; //obtener Foraneas
	$.post("../Logica/ScriptsPHP/requestUsuario.php",{nproceso: nproceso}, prepareDataResponse); 
  	return false;	
}

function prepareDataResponse(data)
{
	array = new Array();
	secciones = new Array();
	dependencias = new Array();
	
	array = $.parseJSON(data);
	secciones = array['secciones'];
	dependencias = array['dependencias'];
	
	$('#dependencia').append('<select class="form-control" name = "iddependencia" id = "iddependencia" class="input-xlarge">');
	
	for(i = 0; i < dependencias.length; i++)
	{
		$('#iddependencia').append('<option value = "'+dependencias[i].idseccion+'">'+dependencias[i].nombre+'</option>');
	}
	
	$('#seccion').append('<select class="form-control" name = "idseccion" id = "idseccion" class="input-xlarge">');
	
	for(i = 0; i < secciones.length; i++)
	{
		$('#idseccion').append('<option value = "'+secciones[i].idseccion+'">'+secciones[i].nombre+'</option>');
	}
	
	
	$('#roles').append('<p><p><form id="rolesform" action="#" method="post">');
	$('#rolesform').append('<select multiple="multiple" size="10" name="duallistbox_roles" class="roles">');	
	var tablaRoles = $('.roles').bootstrapDualListbox(
		{
          nonSelectedListLabel: 'Non-selected',
          selectedListLabel: 'Selected',
          preserveSelectionOnMove: 'moved',
          moveOnSelect: false,
        } );
	
	for(i = 0; i < 9; i++)
	{
		tablaRoles.append('<option value="'+i+'">opcion'+i+'</option>');
		tablaRoles.bootstrapDualListbox('refresh');
	}
}
