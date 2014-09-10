/**
 * @author User
 */

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
 
  var sublinea = $("#sublinea").val();
  var activo = $("#activo").prop("checked");
  var idlinea = $("#idlinea").val();
  
  if(activo == true)
  {
  	activo = 1;
  }
  else if(activo == false)
  {
  	activo = 0;
  }

  var JSON = $.parseJSON('{"idslinea":0, "nombre":"'+sublinea+'", "activo":'+activo+', "idlinea":'+idlinea+'}'); 
  
  $.post("../logica/ScriptsPHP/requestSublinea.php",{Json:JSON}, dataR); 
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
		//setTimeout ("redireccionar()", 2000);
		//alert("La sublinea no ha sido agregada");
		document.write(bandera);
	}
	
}

function redireccionar()
{
	location.href = "main.html";	
}