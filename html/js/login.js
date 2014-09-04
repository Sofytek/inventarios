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

 $(document).ready(onclick);

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
  
  	setTimeout ("redireccionar()", 2000); 
  	alert(argument);
  	
//var obj = JSON.parse(argument);
  //if(obj.)
}

function redireccionar()
{
	location.href = "main.html";	
}
