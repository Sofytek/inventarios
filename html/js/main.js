/*var doc =$('#btnsalir');
doc.ready(logoff);
*/
function cargarMenu() {
	
	var result = jQuery.parseJSON($.cookie('menu_'));
	var menu = result.menu;
	for(var i=0 ;i<menu.length;i++)
	{
		//<li><a href="Empresa.html">Empresa</a></li>
		$('#listaMenu').append("<li><a href=\"" + menu[i] + ".html\">"+ menu[i] +"</a></li>");	
	}
	$('#listaMenu').append("<li><a onclick=\"return logoff();\">Salir</a></li>");
}

function logoff(){
	var nproseso =-1;
	url="../logica/ScriptsPHP/Rlog.php";
	$.post(url, {'nproceso':nproseso}, result);
}

function result(argument){
	location.href = "index.html?logoff=1";
}
