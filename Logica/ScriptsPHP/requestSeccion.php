<?php
require_once ('../Controler/HCSeccion.php');

    session_start();
	
	$arrseccion = ($_POST['Json']);
  
  	$control = new HCSeccion($_SESSION);
  
  if($arrseccion != null)
  {
   	$control->cargarSeccion($arrseccion);
    try
    {
      $control->crearSeccion();
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
    echo("Ingrese el nombre de la seccion");
  }
?>