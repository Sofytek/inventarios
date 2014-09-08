<?php
require_once ('../Controler/HCusuario.php');

  session_start();
  $arrayUsuario = ($_POST['Json']);
 
  $control = new HCusuario($_SESSION);
  
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
?>