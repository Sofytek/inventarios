<?php
require_once ('../bdcontrol/Conexion.php');
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/Conexion.php";
abstract class SystemControl
{
	static protected $conex;	
	//private  usuario $usuario;
  	protected $rolEmpresa = false;//nombre del requerimeinto (P)
	
  	public function __construct($session){
		$conex = new Conexion();
		$conex->conectar();
		DataAccess::setConexion($conex);
	}
	
	public function __destruct(){
		if(self::$conex)
		{
			$conex->desconectar(); 	
		} 
	}

	public function SystemControl($session, $name, $password){
		
	}
  
	public function getRoles(){
	}
	
	public function getConexion()
	{
		return $this->conex;
	}
  
}

?>