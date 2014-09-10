/**
 * @author User
 */

var x;
x=$(document);
x.ready(events);

function events()
{
  var x = $("#botonGuardarArticulo");
  x.click(pressButton);
}

function pressButton()
{
 
  var articulo = $("#articulo").val();
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

  var JSON = $.parseJSON('{"idarticulo":0, "nombre":"'+articulo+', "activo":'+activo+', "idseccion":'+idSeccion+', "idslinea":'+idSublinea+', 
    "idmarca":'+idMarca+', "tipo":'+tipo+', "referencia":'+referencia+', "id_envio":'+idEnvio+', "unidad":'+unidad+', "capitalizado_el_af":'+capitalizado+',
    "amo_acum_af":'+amorAcumulada+', "val_cont_af":'+valContable+', "numero_serie_af":'+numSerie+', "plaqueta_af":'+plaqueta+', 
    "plaqueta_anterior1_af":'+plaquetaAnt1+', "activo_fijo_af":'+activoFijo+', "supranumero_af":'+supranumero+', "plaqueta_anterior2_af":'+plaquetaAnt2+', "cc_responsable_af":'+ccResponsable+'}'); 
  
  $.post("../logica/ScriptsPHP/requestArticulo.php",{Json:JSON}, dataR); 
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
		setTimeout ("redireccionar()", 2000);
		alert("El articulo no ha sido agregado");
	}
	
}

function redireccionar()
{
	location.href = "main.html";	
}