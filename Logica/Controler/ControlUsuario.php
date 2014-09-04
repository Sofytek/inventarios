<?php
require_once 'SystemControl.php';
require_once '../Model/Usuario.php';
//require_once '../bdcontrol/DataAcces.php';
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/Model/Empresa.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/DataAcces.php";

abstract class ControlEmpresa extends SystemControl
{
	private $usuario;
	public function __construct($session){
		parent::__construct($session);
		$this->usuario = null;
	}

	public function setUsuario($arrayUsuario){
		$this->empresa = new Usuario();
		$this->empresa->setData($arrayUsuario);		
	}
	
	//crea un ususario
	final public function crearUsuario(){
		if($this->usuario == null){
			throw new Exception('Usuario sin datos');
		}
		DataAccess::write($this->usuario);
		
	}
	
	//modifica un usuario existente
	final protected function modificarUsuario(){
		if($this->empresa != null){
			throw new Exception('Usuario sin datos');
		}
		DataAccess::update($this->usuario);	
	}  

	//Elimina un usuario existente
	final protected function eliminar(){
		if($this->empresa != null){
			throw new Exception('Empresa sin datos');
		}
		DataAccess::delete($this->usuario);	
	}
	
	final protected function consultarEmpresas()
	{
		return DataAccess::selectWhere($this->usuario, " ");
	}
}
?>