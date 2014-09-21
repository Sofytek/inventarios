<?php
require_once ('../Controler/HCsublinea.php');

    session_start();

    $nproceso = $_REQUEST['nproceso'];
   	$control = new HCsublinea($_SESSION);
  
  switch($nproceso)
  { 
    case 1: // Registro de una sublinea 
      $arrsublinea = ($_POST['Json']);     
      if($arrsublinea != null)
        {
          $control->cargarSublinea($arrsublinea);
          try
          {
              	$control->crearSublinea();
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
          echo("Ingrese el nombre de la sublinea");
        break;
        }
    
    case 2: // consulta de una Sublinea
      
        $control ->cargarSublinea(null);
        $result = $control->obtenerConsulta();
        $linea = $control->obtenerLineas(FALSE);
      
            
      $arrayJson ['sublinea'] = $result;
      $arrayJson ['linea'] = $linea;
      
      echo json_encode($arrayJson);
      break;
      
    case 3: //obtener listado de lineas asociadas a una sublinea (foraneas)
    
      $linea = $control->obtenerLineas(TRUE);  
      if(json_encode($linea))
      {
        echo json_encode($linea);
      }
      break;
    
    case 4://consulta de una sola sublineas
    
      $idslinea = $_POST['id'];
      $control ->cargarSublinea(null);
      $result = $control->obtenerSublineaXid($idslinea);
      $linea = $control->obtenerLineas(TRUE);
      
            
      $arrayJson ['sublinea'] = $result;
      $arrayJson ['linea'] = $linea;
      
      echo json_encode($arrayJson);
      break;
      
    case 5://Modificar sublinea
    
      $arrsublinea = ($_POST['Json']);     
      if($arrsublinea != null)
        {
          $control->cargarSublinea($arrsublinea);
          try
          {
              $control->modificarSublinea();
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
          echo("Ingrese el nombre de la sublinea");
        break;
        }

  }
?>