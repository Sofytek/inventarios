<?php
    require_once 'SystemControl.php';
require_once '../Model/Articulo.php';

abstract class ControlArticulo extends SystemControl
{
	private $articulo;

	public function __construct($session)
	{
		parent::__construct($session);
		$this->articulo = null;
	}

	public function __destruct()
	{
        parent::__destruct();
    }

	public function setArticulo($arrarticulo){
		$this->ariculo = new Articulo($arrarticulo);		
	}

	/*
	 *$articulo debe estar cargado previamente para
	 *poder ser creada, actualizada o eliminada.
	 */
	//crea una articulo
	final public function crearArticulo(){
		if($this->articulo == null){
			throw new Exception('Articulo sin datos');
		}
		DataAccess::write($this->articulo);
		
	}
	
	//modifica una articulo existente
	final protected function modificarArticulo(){
		if($this->articulo != null){
			throw new Exception('Articulo sin datos');
		}
		DataAccess::update($this->articulo);	
	}  

	//Elimina una articulo existente
	final protected function eliminar(){
		if($this->articulo != null){
			throw new Exception('articulo sin datos');
		}
		DataAccess::delete($this->articulo);	
	}
	
	final protected function consultarArticulos()
	{
		return DataAccess::selectWhere($this->articulo, " ");
	}
}
?>