<?php
require_once ('../Controler/HCusuario.php');

  session_start();
  $nproceso = $_REQUEST['nproceso'];
  $control = new HCusuario($_SESSION);
  
  switch($nproceso)
  {
  	case 1:
			
		$arrayUsuario = ($_POST['Json']);
	 
	  	if($arrayUsuario != null)
	  	{
	    	$control->cargarUsuario($arrayUsuario);
	    	try
	    	{
	      		$control->crearUsuario();
		  		echo TRUE;
	    	}
	    	catch(Exception $e)
		    {
		      echo $e->getMessage();
		    }
	  	}
	  	else
	  	{
	   	 	//creacion de mensaje de respuesta (P)  
	   		 echo("Ingrese los datos de la empresa");
	  	}
		break;	
		
	case 2:
		
		$control->cargarUsuario(null);
		$usuario = $control->obtenerConsulta();
		$seccion = $control->ObtenerSecciones(FALSE);
		
		$arrayjson['usuario'] = $usuario;
		$arrayjson['seccion'] = $seccion;
		
		echo json_encode($arrayjson);
		break;	
	case 3:
		
		$secciones = $control->ObtenerSecciones(TRUE);
		$dependencias = $control->ObtenerDependencias(TRUE);
		
		$arrayjson['secciones'] = $secciones;
		$arrayjson['dependencias'] = $dependencias;
		
		echo json_encode($arrayjson);
		break;
		
  }
  
?>