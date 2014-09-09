<?php
    require_once 'SystemControl.php';
require_once '../Model/Seccion.php';
//require_once '../bdcontrol/DataAcces.php';
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/Model/Seccion.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/DataAcces.php";

abstract class ControlSeccion extends SystemControl
{
	private $seccion;
	public function __construct($session){
		parent::__construct($session);
		$this->seccion = null;
	}

	public function setSeccion($arrseccion){
		$this->seccion = new Seccion($arrseccion);		
	}

	/*
	 *$seccion debe estar cargado previamente para
	 *poder ser creada, actualizada o eliminada.
	 */
	//crea una seccion
	final public function crearSeccion(){
		if($this->seccion == null){
			throw new Exception('Seccion sin datos');
		}
		DataAccess::write($this->seccion);
		
	}
	
	//modifica una seccion existente
	final protected function modificarSeccion(){
		if($this->seccion != null){
			throw new Exception('Seccion sin datos');
		}
		DataAccess::update($this->seccion);	
	}  

	//Elimina una seccion existente
	final protected function eliminar(){
		if($this->seccion != null){
			throw new Exception('Seccion sin datos');
		}
		DataAccess::delete($this->seccion);	
	}
	
	final protected function consultarSecciones()
	{
		return DataAccess::selectWhere($this->seccion, " ");
	}
}
?>