<?php
require_once ('../Controler/HCempresa.php');

  session_start();
  $arrempresa = ($_POST['Json']);
  
  $control = new HCempresa($_SESSION);
  
  if($arrempresa != null){
    $control->cargarEmpresa($arrempresa);
    try{
      $control->crearEmpresa();
    }catch(Exception $e){
      echo $e->getMessage();
    }
  }else{
    //creacion de mensaje de respuesta (P)  
    echo("Ingrese el nombre de la empreza");
  }
?>