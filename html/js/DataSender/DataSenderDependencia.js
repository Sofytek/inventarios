/**
 * @author User
 */
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
  
  $.post("../logica/ScriptsPHP/requestDependencia.php",{Json:JSON}, dataR); 
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
