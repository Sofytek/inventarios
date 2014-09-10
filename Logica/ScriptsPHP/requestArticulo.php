<?php
require_once ('../Controler/HCarticulo.php');

    session_start();
	
	$arrarticulo = ($_POST['Json']);
  
  	$control = new HCarticulo($_SESSION);
  
  if($arrarticulo != null)
  {
   	$control->cargarArticulo($arrarticulo);
    try
    {
      $control->crearArticulo();
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
    echo("Ingrese el nombre de la Articulo");
  }
?>