<?php
require_once ('../Controler/HCDependencia.php');

    session_start();
	
	$nproceso = $_REQUEST['nproceso'];
	$control = new HCDependencia($_SESSION);
	
	switch($nproceso)
	{	
		case 1: // Registro de una dependencia 
			$arrdependencia = ($_POST['Json']);		  
			if($arrdependencia != null)
		  	{
		   		$control->cargarDependencia($arrdependencia);
		    	try
		    	{
		      		$control->crearDependencia();
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
		    	echo("Ingrese el nombre de la dependencia");
				break;
	  		}
		
		case 2: // consulta de una dependencia
			
		  	$control ->cargarDependencia(null);
		  	$result = $control->obtenerConsulta();
			$empresa = $control->obtenerEmpresa(FALSE);
			
			//$jsonDependencia = json_encode($result);
			//$jsonEmpresa = json_encode($empresa);
						
			$arrayJson ['dependencia'] = $result;
			$arrayJson ['empresa'] = $empresa;
			
			echo json_encode($arrayJson);
			break;
			
		case 3: //obtener listado de empresas asociadas a una dependencia (foraneas)
		
			$empresa = $control->obtenerEmpresa(TRUE);	
			if(json_encode($empresa))
			{
				echo json_encode($empresa);
			}
			break;
		
		case 4://consulta de una sola dependencia
		
			$iddependencia = $_POST['id'];
			$control ->cargarDependencia(null);
		  	$result = $control->obtenerDependenciaXid($iddependencia);
			$empresa = $control->obtenerEmpresa(TRUE);
			
			//$jsonDependencia = json_encode($result);
			//$jsonEmpresa = json_encode($empresa);
						
			$arrayJson ['dependencia'] = $result;
			$arrayJson ['empresa'] = $empresa;
			
			echo json_encode($arrayJson);
			break;
			
		case 5://Modificar Dependencia
		
			$arrdependencia = ($_POST['Json']);		  
			if($arrdependencia != null)
		  	{
		   		$control->cargarDependencia($arrdependencia);
		    	try
		    	{
		      		$control->modificarDependencia();
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
		    	echo("Ingrese el nombre de la dependencia");
				break;
	  		}

	}
?>