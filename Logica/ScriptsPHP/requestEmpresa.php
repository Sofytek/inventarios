<?php
require_once ('../Controler/HCempresa.php');
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/Controler/HCempresa.php";

  session_start();
  $empresa = $_POST['Nempresa'];
  $activo = $_POST['Eactivo'];
  
  $control = new HCempresa($_SESSION);
  
  if($empresa != null){
    $control->cargarEmpresa($empresa, $activo);
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