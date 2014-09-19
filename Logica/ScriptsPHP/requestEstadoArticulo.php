<?php
require_once ('../Controler/HCEstadoArticulo.php');

    session_start();
	
	$nproceso = $_REQUEST['nproceso'];
	$control = new HCEstadoArticulo($_SESSION);
	
	switch($nproceso)
	{	
		case 1: // Registro de un estado Articulo 
			$arrestadoArticulo = ($_POST['Json']);		  
			if($arrestadoArticulo != null)
		  	{
		   		$control->cargarEstadoArticulo($arrestadoArticulo);
		    	try
		    	{
		      		$control->crearEstadoArticulo();
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
		    	echo("Ingrese el nombre del estado Articulo");
				break;
	  		}
		
		case 2: // consulta de una seccion
			
		  	$control ->cargarEstadoArticulo(null);
		  	$result = $control->obtenerConsulta();
			
			$arrayJson ['estadoArticulo'] = $result;
			
			echo json_encode($arrayJson);
			break;
					
		case 4://consulta de un solo estado Articulo
		
			$idestadoArticulo = $_POST['id'];
			$control ->cargarEstadoArticulo(null);
		  	$result = $control->obtenerEstadoArticuloXid($idestadoArticulo);
			
			$arrayJson ['estadoArticulo'] = $result;
			
			echo json_encode($arrayJson);
			break;
			
		case 5://Modificar estadoArticulo
		
			$arrestadoArticulo = ($_POST['Json']);		  
			if($arrestadoArticulo != null)
		  	{
		   		$control->cargarEstadoArticulo($arrestadoArticulo);
		    	try
		    	{
		      		$control->modificarEstadoArticulo();
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
		    	echo("Ingrese el nombre del estado Articulo");
				break;
	  		}
			break;

	}
?>
