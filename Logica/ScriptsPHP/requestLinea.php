<?php
require_once ('../Controler/HClinea.php');

  session_start();
  $arrlinea = ($_POST['Json']);
  echo $arrlinea['nombre'];
  $control = new HClinea($_SESSION);
  
  if($arrlinea != null){
    $control->cargarLinea($arrlinea);
    try{
      $control->crearLinea();
    }catch(Exception $e){
      echo $e->getMessage();
    }
  }else{
    //creacion de mensaje de respuesta (P)  
    echo("Ingrese el nombre de la Linea");
  }
?>