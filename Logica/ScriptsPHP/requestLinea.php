<?php
require_once ('../Controler/HClinea.php');

  session_start();

  $nproceso = $_REQUEST['nproceso'];
  $control = new HClinea($_SESSION);
  
  switch($nproceso)
  { 
    case 1: // Registro de una linea 
      $arrlinea = ($_POST['Json']);     
      if($arrlinea != null)
        {
          $control->cargarLinea($arrlinea);
          try
          {
              $control->crearLinea();
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
          echo("Ingrese el nombre de la linea");
        break;
        }
    
    case 2: // consulta de una linea
      
        $control ->cargarLinea(null);
        $result = $control->obtenerConsulta();
   
        $arrayJson ['linea'] = $result;
      
      echo json_encode($arrayJson);
      break;
      
    case 3: //  no tiene llaves (foraneas)
    
       break;
    
    case 4://consulta de una sola linea
    
      $idlinea = $_POST['id'];
      $control ->cargarLinea(null);
      $result = $control->obtenerLineaXid($idlinea);
                  
      $arrayJson ['linea'] = $result;
      
      echo json_encode($arrayJson);
      break;
      
    case 5://Modificar Linea
    
      $arrlinea = ($_POST['Json']);     
      if($arrlinea != null)
        {
          $control->cargarLinea($arrlinea);
          try
          {
            $control->modificarLinea();
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
          echo("Ingrese el nombre de la linea");
        break;
        }

  }
?>