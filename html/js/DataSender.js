/**
 * @author User
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
  var e = $("#empresa").val();
  var a = $("#activo").prop("checked");
  
  if(a == true)
  {
  	a = 0;
  }
  else if(a == false)
  {
  	a = 1;
  }
  
  $.post("../logica/ScriptsPHP/requestEmpresa.php",{Nempresa:e, Eactivo:a}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		setTimeout(location.href = "../html/main.html", 2000);
		alert("La empresa ha sido registrada");
	}
	else
	{
		document.write(bandera);
	}
	
}