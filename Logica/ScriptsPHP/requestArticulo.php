<?php
require_once ('../Controler/HCarticulo.php');

    session_start();
	
	$nproceso = $_REQUEST['nproceso'];
	$control = new HCarticulo($_SESSION);
	
	switch($nproceso)
	{	
		case 1: // Registro de una dependencia 
			$arrarticulo = ($_POST['Json']);		  
			if($arrarticulo != null)
		  	{
		   		$control->cargarArticulo($arrarticulo);
		    	try
		    	{
		      		$control->crearArticulo();
			  		echo TRUE;
					break;
		   		}
		    	catch(Exception $e)
		    	{
		     		 echo $e->getMessage();
					 break;
				} 
		  	}
			 else
		  	{
		    	//creacion de mensaje de respuesta (P)  
		    	echo("Ingrese el nombre del articulo");
				break;
	  		}
		
		case 2: // consulta de foraneas
			
		  	$control ->cargarArticulo(null);
		  	$result = $control->obtenerConsulta();
			$marca = $control->obtenerMarca(FALSE);
			$seccion = $control->obtenerSeccion(FALSE);
			$sublinea = $control->obtenerSublinea(FALSE);
							
			$arrayJson ['articulo'] = $result;
			$arrayJson ['marca'] = $marca;
			$arrayJson ['seccion'] = $seccion;
			$arrayJson ['sublinea'] = $sublinea;
			
			echo json_encode($arrayJson);
			break;
			
		case 3: //obtener listado de foraneas asociadas a un articulo
		
			$marca = $control->ObtenerMarcas(TRUE);	
			$seccion = $control->ObtenerSecciones(TRUE);
			$sublinea = $control->ObtenerSublineas(TRUE);
			
			$arrayJson ['marca'] = $marca;
			$arrayJson ['seccion'] = $seccion;
			$arrayJson ['sublinea'] = $sublinea;
			
			echo json_encode($arrayJson);
			break;
			
	}
?>