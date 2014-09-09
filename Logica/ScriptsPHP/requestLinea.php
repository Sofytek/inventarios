<?php
require_once ('../Controler/HClinea.php');

  session_start();
  $arrlinea = ($_POST['Json']);
  $control = new HClinea($_SESSION);
  
  if($arrlinea != null)
  {
    $control->cargarLinea($arrlinea);
    try
    {
      $control->crearLinea();
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
    echo("Ingrese el nombre de la Linea");
  }
?>