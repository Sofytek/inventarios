/**
 * @author User
 */
prepareData();
var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarArticulo");
  var y = $("#activoFijo");
  
  x.click(pressButton);
  y.click(formularioActivoFijo);
}

function pressButton()
{
 
  /*var articulo = $("#articulo").val();
  var tipo = $("#tipo").val();
  var referencia = $("#referencia").val();
  var unidad = $("#unidad").val();
  var activo = $("#activo").prop("checked");
  var idMarca = $("#idmarca").val();
  var idSeccion = $("#idseccion").val();
  var idSublinea = $("#idsublinea").val();
  var idEnvio = $("#idenvio").val();
  var activoFijo = $("#activoFijo").prop("checked");
  var capitalizado = $("#capitalizado").val();
  var amorAcumulada = $("#amoracumulada").val();
  var valContable = $("#valcontable").val();
  var numSerie = $("#numserie").val();
  var plaqueta = $("#plaqueta").val();
  var plaquetaAnt1 = $("#plaquetaant1").val();
  var plaquetaAnt2 = $("#plaquetaant2").val();
  var supranumero = $("#supranumero").val();
  var ccResponsable = $("#ccresponsable").val();

  //validacion del campo activo segun naturaleza
  if(activo == true)
  {
  	activo = 1;
  }
  else if(activo == false)
  {
  	activo = 0;
  }

  //validacion del campo activoFijo segun naturaleza
  if(activoFijo == true)
  {
    activoFijo = 1;
  }
  else if(activoFijo == false)
  {
    activoFijo = 0;
  }

 /* var JSON = $.parseJSON('{"idarticulo":0, "nombre":"'+articulo+', "activo":'+activo+', "idseccion":'+idSeccion+', "idslinea":'+idSublinea+', 
    "idmarca":'+idMarca+', "tipo":'+tipo+', "referencia":'+referencia+', "id_envio":'+idEnvio+', "unidad":'+unidad+', "capitalizado_el_af":'+capitalizado+',
    "amo_acum_af":'+amorAcumulada+', "val_cont_af":'+valContable+', "numero_serie_af":'+numSerie+', "plaqueta_af":'+plaqueta+', 
    "plaqueta_anterior1_af":'+plaquetaAnt1+', "activo_fijo_af":'+activoFijo+', "supranumero_af":'+supranumero+', "plaqueta_anterior2_af":'+plaquetaAnt2+', "cc_responsable_af":'+ccResponsable+'}');*/ 
  
  var nproceso = 1;
  var JSON = $('#formularioArticulo').serializeJSON();
  $.post("../logica/ScriptsPHP/requestArticulo.php",{Json:JSON, nproceso: nproceso}, dataR); 
  return false;
}

function dataR(bandera)
{
  	if(bandera == 1)
	{
		setTimeout ("redireccionar()", 2000); 
  		alert("el articulo ha sido agregado");
	}
	else
	{
		document.write(bandera);
		/*setTimeout ("redireccionar()", 2000);
		alert("El articulo no ha sido agregado");*/
	}
	
}

function redireccionar()
{
	location.href = "main.html";	
}

function prepareData()
{
	var nproceso = 3;
	$.post("../logica/ScriptsPHP/requestArticulo.php",{nproceso: nproceso}, responsePrepareData);	
	return false;
}

function responsePrepareData(data)
{
	var array = new Array();
	var marcas = new Array();
	var seccion = new Array();
	var sublinea = new Array();
	
	array = $.parseJSON(data);
	marcas = array['marca'];
	seccion = array['seccion'];
	sublinea = array['sublinea'];
	
	$('#Mmarca').append('<select class="form-control" id = "idmarca" name = "idmarca" class="input-xlarge">');
	$('#Ssublinea').append('<select class="form-control" id = "idsublinea" name = "idslinea" class="input-xlarge">');
	$('#Sseccion').append('<select class="form-control" id = "idseccion" name = "idseccion" class="input-xlarge">');
	
	for(i = 0; i < marcas.length; i++)
	{
		if(marcas[i].activo == 1)
		{
			$('#idmarca').append('<option value = '+marcas[i].idmarca+'>'+marcas[i].nombre+'</option>');	
		}
	}	
	for(j = 0; j < seccion.length; j++)
	{
		if(seccion[j].activo == 1)
		{
			$('#idseccion').append('<option value = '+seccion[j].idseccion+'>'+seccion[j].nombre+'</option>');	
		}
	}	
	for(k = 0; k < sublinea.length; k++)
	{
		if(sublinea[k].activo == 1)
		{
			$('#idsublinea').append('<option value = '+sublinea[k].idslinea+'>'+sublinea[k].nombre+'</option>');	
		}
	}
	
	$('#formularioActivo').css('display', 'none');	
}

function formularioActivoFijo()
{
	if($("#activoFijo").prop("checked"))
	{
		$('#formularioActivo').css('display', 'block');	
	}
	else
	{
		$('#formularioActivo').css('display', 'none');
	}
}
