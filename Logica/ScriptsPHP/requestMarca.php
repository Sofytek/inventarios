<?php
require_once ('../Controler/HCmarca.php');

    session_start();
    $arrmarca = ($_POST['Json']);
    $control = new HCmarca($_SESSION);
  
  if($arrmarca != null)
  {
   	$control->cargarMarca($arrmarca);
    try
    {
      $control->crearMarca();
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
    echo("Ingrese el nombre de la marca");
  }
?>