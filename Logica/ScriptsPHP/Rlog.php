<?php
require_once ('../Controler/HClog.php');

session_start();

$nproceso = $_REQUEST['nproceso'];

switch ($nproceso) {
	case '-1':
        $_SESSION['id'] = null;
        $_SESSION['Usuario'] = null;
        $_SESSION['logon'] = FALSE; 
		session_destroy();
        
        $proseso['result'] = FALSE; 
        $proseso['codigo'] = 1; 
        echo json_encode($proseso);
		break;

	case '1'://log on
        $usuario = $_REQUEST['user'];
        $password = $_REQUEST['password'];
    
        if(isset($usuario, $password)){
            try {
                $controlLog = new HClog($_SESSION, $usuario, $password);
            
                $proseso['result'] = true;
                $proseso['usuario'] = $_SESSION['Usuario'];
                
                echo json_encode($proseso);
            }
            catch (exception $e) 
            {
                $proseso['result'] = FALSE; 
                $proseso['mensaje'] = $e->getMessage(); 
                
                echo json_encode($proseso);
            }    
        }else{
            echo "Campos requeridos en null";
        }		
		break;
	
    case '2':
        if(isset($_SESSION['logon']))
        {            
            if($_SESSION['logon'])
            {
                $proseso['result'] = TRUE; 
                $proseso['menu'] = $_SESSION['roles'];               
                $proseso['usuario'] = $_SESSION['Usuario'];               
            }
            else
            {
                $proseso['result'] = FALSE; 
                $proseso['codigo'] = 0; 
            }
        }
        else {
            $proseso['result'] = FALSE;
            $proseso['codigo'] = 0; 
        }
        echo json_encode($proseso);
        break;
    
	default:
		
		break;
}
?>