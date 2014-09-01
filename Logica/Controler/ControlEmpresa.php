<?php
require_once 'SystemControl.php';
require_once '../Model/Empresa.php';
require_once '../bdcontrol/DataAcces.php';
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/Model/Empresa.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/DataAcces.php";

abstract class ControlEmpresa extends SystemControl
{
	private $empresa;
	public function __construct($session){
		parent::__construct($session);
		$this->empresa = null;
	}

	public function setEmpresa($nombre, $activo){
		$this->empresa = new Empresa(0, $nombre, $activo);		
	}

	/*
	 *$empresa deve estar cargado previamente para
	 *poder ser creada, actualizada o eliminada.
	 */
	//crea una empresa
	final public function crearEmpresa(){
		if($this->empresa == null){
			throw new Exception('Empresa sin datos');
		}
		DataAccess::write($this->empresa);
		
	}
	
	//modifica una empresa existente
	final protected function modificarEmpresa(){
		if($this->empresa != null){
			throw new Exception('Empresa sin datos');
		}
		DataAccess::update($this->empresa);	
	}  

	//Elimina una empresa existente
	final protected function eliminar(){
		if($this->empresa != null){
			throw new Exception('Empresa sin datos');
		}
		DataAccess::delete($this->empresa);	
	}
	
	final protected function consultarEmpresas()
	{
		return DataAccess::reportar($this->empresa);
	}
}
?>