var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarMarca");
  x.click(pressButton);
}

function pressButton()
{
 
  var marc = $("#marca").val();
  var activo = $("#activo").prop("checked");
  
  if(activo == true)
  {
  	activo = 1;
  }
  else if(activo == false)
  {
  	activo = 0;
  }

  var JSON = $.parseJSON('{"idmarca":0, "nombre":"'+marc+'", "activo":'+activo+'}'); 
  
  $.post("../logica/ScriptsPHP/requestMarca.php",{Json:JSON}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("La Marca ha sido agregada");
	}
	else
	{
		setTimeout ("redireccionar()", 2000);
		alert("La marca no ha sido agregada");
	}
	
}

function redireccionar()
{
	location.href = "main.html";	
}
