function cargarMenu() {
	var nproseso = 2;
	var url="../Logica/ScriptsPHP/Rlog.php";
	$.post(url, {'nproceso':nproseso}, result);
}

function logoff(){
	var nproseso =-1;
	url="../Logica/ScriptsPHP/Rlog.php";
	$.post(url, {'nproceso':nproseso}, result);
}

function result(argument){
	
	var obj = jQuery.parseJSON(argument);
	
	if (obj.result) {
		var menu = obj.menu;
		var menus = new Array();
		menus =  menu.nombres;
		
		for(var i=0 ;i<menus.length;i++)
		{
			var href = menus[i] + ".html";
			href = href.replace(' ','');
			$('#listaMenu').append("<li><a onclick=\"return changeFrame('consulta" + href + "');\">"+ menus[i] +"</a></li>");	
		}
		$('#listaMenu').append("<li><a onclick=\"return logoff();\">Salir</a></li>");
		$('#userinfo').append("Usuario: " + obj.usuario);
		
	} else {
		if(obj.codigo == 1)
		{
			location.href = "index.html?logoff=1";
		}
		else 
		{
			location.href = "index.html?logoff=2";
		}
	}
}

function changeFrame (url) {
	$('#frame').attr("src", url);
}