<?php
require_once ('../Controler/HCmarca.php');

    session_start();
    
    $nproceso = $_REQUEST['nproceso'];;
    $control = new HCmarca($_SESSION);
  
 switch($nproceso)
  { 
    case 1: // Registro de una marca 
      $arrmarca = ($_POST['Json']);     
      if($arrmarca != null)
        {
          $control->cargarMarca($arrmarca);
          try
          {
              $control->crearMarca();
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
          echo("Ingrese el nombre de la marca");
        break;
        }
    
    case 2: // consulta de una marca
      
        $control ->cargarMarca(null);
        $result = $control->obtenerConsulta();
   
        $arrayJson ['marca'] = $result;
      
      echo json_encode($arrayJson);
      break;
      
    case 3: //  no tiene llaves (foraneas)
    
       break;
    
    case 4://consulta de una sola marca
    
      $idmarca = $_POST['id'];
      $control ->cargarMarca(null);
      $result = $control->obtenerMarcaXid($idmarca);
                  
      $arrayJson ['marca'] = $result;
      
      echo json_encode($arrayJson);
      break;
      
    case 5://Modificar marca
    
      $arrmarca = ($_POST['Json']);     
      if($arrmarca != null)
        {
          $control->cargarMarca($arrmarca);
          try
          {
            $control->modificarMarca();
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
          echo("Ingrese el nombre de la marca");
        break;
        }

  }
?>