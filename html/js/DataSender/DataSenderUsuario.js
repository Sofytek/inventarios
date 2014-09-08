/**
 * @author Familia Villagran
 */
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
  var usuario = $("#formularioUsuario").serializeJSON();
  $.post("../logica/ScriptsPHP/requestUsuario.php",{Json:usuario}, dataR); 
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
