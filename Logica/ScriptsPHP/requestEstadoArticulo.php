<?php
require_once ('../Controler/HCEstadoArticulo.php');

    session_start();
	
	$arrestadoArticulo = ($_POST['Json']);
  
  	$control = new HCEstadoArticulo($_SESSION);
  
  if($arrestadoArticulo != null)
  {
   	$control->cargarEstadoArticulo($arrestadoArticulo);
    try
    {
      $control->crearEstadoArticulo();
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
    echo("Ingrese el nombre del estadoArticulo");
  }
?>
