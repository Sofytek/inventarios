<?php
require_once 'SystemControl.php';
require_once '../Model/Marca.php';

abstract class ControlMarca extends SystemControl
{
	private $marca;
	public function __construct($session)
	{
		parent::__construct($session);
		$this->marca = null;
	}

	public function __destruct()
	{
        parent::__destruct();
    }

	public function setMarca($arrmarca)
	{
		$this->marca = new Marca($arrmarca);		
	}

	/*
	 *$Marca debe estar cargado previamente para
	 *poder ser creada, actualizada o eliminada.
	 */
	//crea una marca
	final public function crearMarca()
	{
		if($this->marca == null){
			throw new Exception('Marca sin datos');
		}
		DataAccess::write($this->marca);
		
	}
	
	//modifica una Marca existente
	final protected function modificarMarca(){
		if($this->marca != null){
			throw new Exception('Marca sin datos');
		}
		DataAccess::update($this->marca);	
	}  

	//Elimina una Marca existente
	final protected function eliminar(){
		if($this->marca != null){
			throw new Exception('Marca sin datos');
		}
		DataAccess::delete($this->marca);	
	}
	
	final protected function consultarMarcas()
	{
		return DataAccess::selectWhere($this->marca, " ");
	}
}
?>