/*$(document).ready(function(){
	$("#iniciar").click(function(){
		var usuario = $('#usuario').val();
		var password = $('#password').val();
		//console.log(usuario,contrasenia);
		$.ajax({
			type: "POST", 
			dataType: 'json',
			url: '../logica/ScriptsPHP/Rlog.php',
			data:{usuario:usuario, password:password},
			success:function(response){
				if(response.respuesta == true){
					$("#mensaje").html(response.mensaje)
					window.location = 'Principal.php';
				}
				else{
					$("#mensaje").html(response.mensaje)
				}
			},error:function(){
				alert('Error general en el sistema');
			}

		});
	});
});*/
var doc = $(document);
 doc.ready(onclick);

function onclick(){
	$("#iniciar").click(logon);
}

function logon()
{
	var usuario = $('#usuario').val();
	var password = $('#password').val();
	var url = "../logica/ScriptsPHP/Rlog.php";
	var data = 
	
	$.post(url, {'user':usuario, 'password':password}, resul); 
	return false;
}

function resul (argument) {
  
  	/*
  	 var obj = JSON.parse(argument);
  	if(obj.proceso){
  		//post main
  	}
  	else
  	{
 		//doc. pasa el div visble y le da el mensaje del json 		
  	}*/
  	
  	if(argument == 1)
  	{
	  	setTimeout ("redireccionar("+argument+")", 2000); 
	  	alert("Bienvenido");
  	}
  	else
  	{
  		setTimeout("(redireccionar("+argument+")", 2000);	
  	} 
}

function redireccionar(argument)
{
	if(argument == 1)
	{
		location.href = "main.html";		
	}
	else
	{
		location.href = "index.html";		
	}
	
}
