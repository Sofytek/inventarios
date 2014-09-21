/*var doc =$('#btnsalir');
doc.ready(logoff);
*/
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
			//<li><a href="Empresa.html">Empresa</a></li>
			$('#listaMenu').append("<li><a href=\"" + menus[i] + ".html\">"+ menus[i] +"</a></li>");	
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
