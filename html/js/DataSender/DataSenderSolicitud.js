/**
 * @author User
 */
prepareData();
var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarSolicitud");
  x.click(pressButton);
}

function pressButton()
{
 
  var nota = $("#nota").val();
  var tipo = $("#tipo").val();
  var fecha = $("#fecha").val();
  var estado = $("#estado").val();
  var solicitante = $("#solicitante").val();
  var usuario = $("#usuario").val();
  var dependencia = $("#dependencia").val();
  var seccion = $("#seccion").val();
  var notaEnvio = $("#notaenvio").val();
  var fechaEnvio = $("#fechaenvio").val();

  var JSON = $.parseJSON('{"idsolicitud":0, "nota":"'+nota+', "tipo":'+tipo+', "fecha":'+fecha+', "estado":'+estado+',"solicitante":'+solicitante+', "usuario":'+usuario+', "dependencia":'+dependencia+', "seccion":'+seccion+', "notaenvio":'+notaenvio+', "fechaenvio":'+fechaEnvio+'}'); 

  var nproceso = 1; 
  
  $.post("../Logica/ScriptsPHP/requestSolicitud.php",{Json:JSON, nproceso: nproceso}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La Solicitud ha sido agregada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La Solictud no ha sido agregada");
	}
	
}

function redireccionar()
{
	location.href = "main.html";	
}

function prepareData()
{
	var nproceso = 3;
	$.post("../Logica/ScriptsPHP/requestSolicitud.php",{nproceso: nproceso}, responsePrepareData);	
	return false;
}

function responsePrepareData(data)
{
	var arrayUsuario = new Array();
	var arrayDependencia = new Array ();
	var arraySeccion = new Array ();

	arrayUsuario = $.parseJSON(data);
	arrayDependencia = $.parseJSON(data);
	arraySeccion = $.parseJSON(data);

	$('#Ausuario').append('<select class="form-control" id = "usuario" class="input-xlarge">');
	for(i = 0; i < arrayUsuario.length; i++)
	{
		if(arrayUsuario[i].activo == 1)
		{
			$('#usuario').append('<option value = '+arrayUsuario[i].idusuario+'>'+arrayUsuario[i].apellidos+'</option>');	
		}
	}

	$('#Adependencia').append('<select class="form-control" id = "dependencia" class="input-xlarge">');
	for(i = 0; i < arrayDependencia.length; i++)
	{
		if(arrayDependencia[i].activo == 1)
		{
			$('#dependencia').append('<option value = '+arrayDependencia[i].iddependencia+'>'+arrayDependencia[i].nombre+'</option>');	
		}
	}

	$('#Aseccion').append('<select class="form-control" id = "seccion" class="input-xlarge">');
	for(i = 0; i < arraySeccion.length; i++)
	{
		if(arraySeccion[i].activo == 1)
		{
			$('#seccion').append('<option value = '+arraySeccion[i].iddependencia+'>'+arraySeccion[i].nombre+'</option>');	
		}
	}
}