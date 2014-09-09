var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarLinea");
  x.click(pressButton);
}

function pressButton()
{
 
  var nomLinea = $("#linea").val();
  var activo = $("#activo").prop("checked");
  
  if(activo == true)
  {
  	activo = 1;
  }
  else if(activo == false)
  {
  	activo = 0;
  }

  var JSON = $.parseJSON('{"idlinea":0, "nombre":"'+nomLinea+'", "activo":'+activo+'}'); 
  
  $.post("../logica/ScriptsPHP/requestLinea.php",{Json:JSON}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La Linea ha sido agregada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La Linea no ha sido agregada");
	}
	
}

function redireccionar()
{
	location.href = "main.html";	
}
