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
  	a = 1;
  }
  else if(a == false)
  {
  	a = 0;
  }
  
  var JSON = $.parseJSON('{"idempresa":0, "nombre":"'+e+'", "activo":'+a+'}'); 
  var nproceso = 1; 

  $.post("../Logica/ScriptsPHP/requestEmpresa.php",{Json:JSON, nproceso: nproceso}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		  setTimeout ("redireccionar()", 2000); 
  		alert("La empresa ha sido agregada");
	}
	else
	{
    setTimeout ("redireccionar()", 2000);
		alert("La empresa no ha sido agregada");
    //document.write(bandera);

	}
	
}

function redireccionar()
{
	location.href = "consultaEmpresa.html";	
}
