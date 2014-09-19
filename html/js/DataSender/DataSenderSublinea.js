/**
 * @author User
 */
prepareData();
var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarSublinea");
  x.click(pressButton);
}

function pressButton()
{
 
  var sublinea = $("#nombre").val();
  var activo = $("#activo").prop("checked");
  var idlinea = $("#linea").val();
  
  if(activo == true)
  {
  	activo = 1;
  }
  else if(activo == false)
  {
  	activo = 0;
  }

  var JSON = $.parseJSON('{"idslinea":0, "nombre":"'+sublinea+'", "activo":'+activo+', "idlinea":'+idlinea+'}'); 
  var nproceso = 1; 

  $.post("../Logica/ScriptsPHP/requestSublinea.php",{Json:JSON, nproceso: nproceso}, dataR); 
  return false;
}

function dataR(bandera)
{
  	
  	if(bandera == 1)
	{
		 setTimeout ("redireccionar()", 2000); 
  		 alert("La sublinea ha sido agregada");
      
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La sublinea no ha sido agregada");
		document.write(bandera);
	}
	
}

function redireccionar()
{
	location.href = "consultaSublinea.html";	
}

function prepareData()
{
  var nproceso = 3;
  $.post("../Logica/ScriptsPHP/requestSublinea.php",{nproceso: nproceso}, responsePrepareData);  
  return false;
}

function responsePrepareData(data)
{
  var array = new Array();
  array = $.parseJSON(data);
  $('#Alinea').append('<select class="form-control" id = "linea" class="input-xlarge">');
  for(i = 0; i < array.length; i++)
  {
    if(array[i].activo == 1)
    {
      $('#linea').append('<option value = '+array[i].idlinea+'>'+array[i].nombre+'</option>');  
    }
  } 
}