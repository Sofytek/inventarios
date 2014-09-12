/**
 * @author User
 */
prepareData();
var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarDependencia");
  x.click(pressButton);
}

function pressButton()
{
 
  var d = $("#dependencia").val();
  var a = $("#activo").prop("checked");
  var e = $("#empresa").val();
  
  if(a == true)
  {
  	a = 1;
  }
  else if(a == false)
  {
  	a = 0;
  }

  var JSON = $.parseJSON('{"iddependencia":0, "nombre":"'+d+'", "activo":'+a+', "idempresa":'+e+'}');
  var nproceso = 1; 
  
  $.post("../logica/ScriptsPHP/requestDependencia.php",{Json:JSON, nproceso: nproceso}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La dependencia ha sido agregada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La dependencia no ha sido agregada");
	}
	
}

function redireccionar()
{
	location.href = "main.html";	
}

function prepareData()
{
	var nproceso = 3;
	$.post("../logica/ScriptsPHP/requestDependencia.php",{nproceso: nproceso}, responsePrepareData);	
	return false;
}

function responsePrepareData(data)
{
	var array = new Array();
	array = $.parseJSON(data);
	$('#Aempresa').append('<select class="form-control" id = "empresa" class="input-xlarge">');
	for(i = 0; i < array.length; i++)
	{
		if(array[i].activo == 1)
		{
			$('#empresa').append('<option value = '+array[i].idempresa+'>'+array[i].nombre+'</option>');	
		}
	}	
}