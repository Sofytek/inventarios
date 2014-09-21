var doc = $(document);
doc.ready(onclick);

function onclick() {
	$("#iniciar").click(logon);
}

function logon() {
	var nproceso = '1';
	var usuario = $('#usuario').val();
	var password = $('#password').val();
	var url = "../logica/ScriptsPHP/Rlog.php";
	var data = $.post(url, {
		'nproceso' : nproceso,
		'user' : usuario,
		'password' : password
	}, resul);

	return false;
}

function resul(argument) {

	var obj = jQuery.parseJSON(argument);

	if (obj.result) {
		location.href = 'main2.html';
	} else if(obj.mensaje){
		$('#debug').empty();
		$('#debug').append("Warnig:<br>" + obj.mensaje);
	}

}

function redireccionar(argument) {
	if (argument == 1) {
		location.href = "main.html";
	} else {
		//location.href = "index.html";
	}

}

function logoff() {
	var logoff = $_GET('logoff');
	if (logoff == 1) {
		$('#debug').append("Session cerrada correctamente.");
	}
	else if(logoff == 2) 
	{	
		$('#debug').append("Porfavor iniciar seccion.");
	}
	else
	{
		var nproceso = '3';
		var url = "../logica/ScriptsPHP/Rlog.php";
		var data = $.post(url, {
		'nproceso' : nproceso,
	}, resul);
	}
}

function $_GET(param) {
	url = document.URL;
	url = String(url.match(/\?+.+/));
	url = url.replace("?", "");
	url = url.split("&");

	x = 0;
	while (x < url.length) {
		p = url[x].split("=");
		if (p[0] == param) {
			return decodeURIComponent(p[1]);
		}
		x++;
	}
}

function loadSession(){
	var nproceso = '3';
	var url = "../logica/ScriptsPHP/Rlog.php";
	var data = $.post(url, {
		'nproceso' : nproceso,
	}, resul);
}
