<?php
require_once 'SystemControl.php';
require_once '../Model/Dependencia.php';
//require_once '../bdcontrol/DataAcces.php';
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/Model/Dependencia.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/DataAcces.php";

abstract class ControlDependencia extends SystemControl
{
	private $dependencia;
	public function __construct($session){
		parent::__construct($session);
		$this->dependencia = null;
	}

	public function setDependencia($arrdependencia){
		$this->dependencia = new Dependencia($arrdependencia);		
	}

	/*
	 *$dependencia debe estar cargado previamente para
	 *poder ser creada, actualizada o eliminada.
	 */
	//crea una dependencia
	final public function crearDependencia(){
		if($this->dependencia == null){
			throw new Exception('Dependencia sin datos');
		}
		DataAccess::write($this->dependencia);
		
	}
	
	//modifica una dependencia existente
	final protected function modificarDependencia(){
		if($this->dependencia != null){
			throw new Exception('Dependencia sin datos');
		}
		DataAccess::update($this->dependencia);	
	}  

	//Elimina una dependencia existente
	final protected function eliminar(){
		if($this->dependencia != null){
			throw new Exception('Dependencia sin datos');
		}
		DataAccess::delete($this->dependencia);	
	}
	
	final protected function consultarDependencias()
	{
		return DataAccess::selectWhere($this->dependencia, " ");
	}
}
?>