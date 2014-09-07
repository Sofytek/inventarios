<?php
require_once 'SystemControl.php';
require_once '../Model/Linea.php';

abstract class ControlLinea extends SystemControl
{
	private $linea;
	public function __construct($session){
		parent::__construct($session);
		$this->linea = null;
	}

	public function setLinea($arrlinea){
		$this->linea = new Linea($arrlinea);		
	}

	/*
	 *$linea debe estar cargado previamente para
	 *poder ser creada, actualizada o eliminada.
	 */
	//crea una linea
	final public function crearLinea(){
		if($this->linea == null){
			throw new Exception('Linea sin datos');
		}
		DataAccess::write($this->linea);
		
	}
	
	//modifica una linea existente
	final protected function modificarLinea(){
		if($this->linea != null){
			throw new Exception('Linea sin datos');
		}
		DataAccess::update($this->linea);	
	}  

	//Elimina una linea existente
	final protected function eliminar(){
		if($this->linea != null){
			throw new Exception('Linea sin datos');
		}
		DataAccess::delete($this->Linea);	
	}
	
	final protected function consultarLinea()
	{
		return DataAccess::selectWhere($this->linea, " ");
	}
}
?>