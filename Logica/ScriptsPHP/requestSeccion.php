<?php
require_once ('../Controler/HCSeccion.php');

    session_start();
	
	$nproceso = $_REQUEST['nproceso'];
	$control = new HCSeccion($_SESSION);
	
	switch($nproceso)
	{	
		case 1: // Registro de una seccion 
			$arrseccion = ($_POST['Json']);		  
			if($arrseccion != null)
		  	{
		   		$control->cargarSeccion($arrseccion);
		    	try
		    	{
		      		$control->crearSeccion();
			  		echo TRUE;
					break;
		   		}
		    	catch(Exception $e)
		    	{
		     		 echo $e->getMessage();
		    	} 
		  	}
			 else
		  	{
		    	//creacion de mensaje de respuesta (P)  
		    	echo("Ingrese el nombre de la seccion");
				break;
	  		}
		
		case 2: // consulta de una seccion
			
		  	$control ->cargarSeccion(null);
		  	$result = $control->obtenerConsulta();
			$dependencia = $control->ObtenerDependencias(FALSE);
			
			$arrayJson ['seccion'] = $result;
			$arrayJson ['dependencia'] = $dependencia;
			
			echo json_encode($arrayJson);
			break;
			
		case 3: //obtener listado de dependencias asociadas a una seccion
		
			$dependencia = $control->ObtenerDependencias(TRUE);	
			if(json_encode($dependencia))
			{
				echo json_encode($dependencia);
			}
			break;
			
		case 4://consulta de una sola seccion
		
			$idseccion = $_POST['id'];
			$control ->cargarSeccion(null);
		  	$result = $control->obtenerSeccionXid($idseccion);
			$dependencia = $control->ObtenerDependencias(TRUE);
			
			//$jsonDependencia = json_encode($result);
			//$jsonEmpresa = json_encode($empresa);
						
			$arrayJson ['seccion'] = $result;
			$arrayJson ['dependencia'] = $dependencia;
			
			echo json_encode($arrayJson);
			break;
			
		case 5://Modificar seccion
		
			$arrseccion = ($_POST['Json']);		  
			if($arrseccion != null)
		  	{
		   		$control->cargarSeccion($arrseccion);
		    	try
		    	{
		      		$control->modificarSeccion();
			  		echo TRUE;
					break;
		   		}
		    	catch(Exception $e)
		    	{
		     		 echo $e->getMessage();
		    	}
		  	}
			 else
		  	{
		    	//creacion de mensaje de respuesta (P)  
		    	echo("Ingrese el nombre de la seccion");
				break;
	  		}

	}
?>