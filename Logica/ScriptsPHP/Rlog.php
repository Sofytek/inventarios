<?php
require_once ('../controler/Hlog.php');
session_start();

$nproceso = $_REQUEST['nproceso'];

switch ($nproceso) {
	case '-1':
        $_SESSION['id'] = null;
        $_SESSION['Usuario'] = null;
        $_SESSION['logon'] = FALSE; 
		session_destroy();
        echo true;            
		break;

	case '1'://log on
        $usuario = $_REQUEST['user'];
        $password = $_REQUEST['password'];
    
        if(isset($usuario, $password)){
            try {
                $controlLog = new HClog($_SESSION, $usuario, $password);
                //echo TRUE;
                
                $menu[0]="Empresa";
                $menu[1]="Dependencia";
                $menu[2]="Seccion";
                $menu[3]="Linea";
                $menu[4]="Sublinea";
                $menu[5]="Marca";
                $menu[6]="Estado Articulo";
                $menu[7]="Usuario";
                      
                $proseso['result'] = true;
                $proseso['menu'] = $menu;
                
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
	
	default:
		
		break;
}
?>