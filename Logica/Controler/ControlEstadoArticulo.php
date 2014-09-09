<?php
require_once 'SystemControl.php';
require_once '../Model/EstadoArticulo.php';
//require_once '../bdcontrol/DataAcces.php';
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/Model/Dependencia.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/DataAcces.php";

abstract class ControlEstadoArticulo extends SystemControl
{
	private $estadoArticulo;
	public function __construct($session){
		parent::__construct($session);
		$this->estadoArticulo = null;
	}

	public function setEstadoArticulo($arrestadoArticulo){
		$this->estadoArticulo = new EstadoArticulo($arrestadoArticulo);		
	}

	/*
	 *$EstadoArticulo debe estar cargado previamente para
	 *poder ser creada, actualizada o eliminada.
	 */
	//crea un estadoArticulo
	final public function crearEstadoArticulo(){
		if($this->estadoArticulo == null){
			throw new Exception('Estado Articulo sin datos');
		}
		DataAccess::write($this->estadoArticulo);
		
	}
	
	//modifica un estadoArticulo existente
	final protected function modificarEstadoArticulo(){
		if($this->estadoArticulo != null){
			throw new Exception('EstadoArticulo sin datos');
		}
		DataAccess::update($this->estadoArticulo);	
	}  

	//Elimina un estadoArticulo existente
	final protected function eliminar(){
		if($this->estadoArticulo != null){
			throw new Exception('EstadoArticulo sin datos');
		}
		DataAccess::delete($this->estadoArticulo);	
	}
	
	final protected function consultarEstadoArticulo()
	{
		return DataAccess::selectWhere($this->estadoArticulo, " ");
	}
}
?>