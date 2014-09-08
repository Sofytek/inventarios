<?php
require_once ('../Controler/HCDependencia.php');

    session_start();
	
	$arrdependencia = ($_POST['Json']);
  
  	$control = new HCDependencia($_SESSION);
  
  if($arrdependencia != null)
  {
   	$control->cargarDependencia($arrdependencia);
    try
    {
      $control->crearDependencia();
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
    echo("Ingrese el nombre de la dependencia");
  }
?>