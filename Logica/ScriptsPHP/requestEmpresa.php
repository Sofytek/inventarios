<?php
require_once ('../Controler/HCempresa.php');

  session_start();
  
  $nproceso = $_REQUEST['nproceso'];
  $control = new HCempresa($_SESSION);
  
  switch($nproceso)
  { 
    case 1: // Registro de una empresa 
      $arrempresa = ($_POST['Json']);     
      if($arrempresa != null)
        {
          $control->cargarEmpresa($arrempresa);
          try
          {
              $control->crearEmpresa();
              echo TRUE;
              break;
          }
          catch(Exception $e)
          {
             echo $e->getMessage();
          }
        }
       else
        {
          //creacion de mensaje de respuesta (P)  
          echo("Ingrese el nombre de la empresa");
        break;
        }
    
    case 2: // consulta de una empresa
      
        $control ->cargarEmpresa(null);
        $result = $control->obtenerConsulta();
   
        $arrayJson ['empresa'] = $result;
      
      echo json_encode($arrayJson);
      break;
      
    case 3: //  no tiene llaves (foraneas)
    
       break;
    
    case 4://consulta de una sola empresa
    
      $idempresa = $_POST['id'];
      $control ->cargarEmpresa(null);
      $result = $control->obtenerEmpresaXid($idempresa);
                  
      $arrayJson ['empresa'] = $result;
      
      echo json_encode($arrayJson);
      break;
      
    case 5://Modificar empresa
    
      $arrempresa = ($_POST['Json']);     
      if($arrempresa != null)
        {
          $control->cargarEmpresa($arrempresa);
          try
          {
              $control->modificarEmpresa();
            echo TRUE;
          break;
          }
          catch(Exception $e)
          {
             echo $e->getMessage();
          }
        }
       else
        {
          //creacion de mensaje de respuesta (P)  
          echo("Ingrese el nombre de la empresa");
        break;
        }

  }
?>