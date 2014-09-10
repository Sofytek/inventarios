<?php
require_once ('../Controler/HCsublinea.php');

    session_start();

    $arrsublinea = ($_POST['Json']);
  
  	$control = new HCsublinea($_SESSION);
  
  if($arrsublinea != null)
  {
   	$control->cargarSublinea($arrsublinea);
    try
    {
      $control->crearSublinea();
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
    echo("Ingrese el nombre de la Sublinea");
  }
?>