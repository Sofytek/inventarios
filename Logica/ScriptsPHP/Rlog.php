<?php
require_once ('../controler/Hlog.php');
session_start();

$usuario = $_REQUEST['user'];
$password = $_REQUEST['password'];

if(isset($usuario, $password)){
    try {
        $controlLog = new HClog($_SESSION, $usuario, $password);
    } catch (exception $e) {
        echo "ERROR: " . $e->getMessage();
    }    
}else{
    echo "Campos requeridos en null";
}

?>