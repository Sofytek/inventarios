<?php
    require_once 'SystemControl.php';
    require_once '../Model/Linea.php';
    require_once '../Model/Sublinea.php';

abstract class ControlSublinea extends SystemControl
{
	private $sublinea;

	public function __construct($session){
		parent::__construct($session);
		$this->sublinea = null;
	}

	public function __destruct()
	{
        parent::__destruct();
    }

	public function setSublinea($arrsublinea){
		$this->sublinea = new Sublinea($arrsublinea);		
	}

	/*
	 *$sublinea debe estar cargado previamente para
	 *poder ser creada, actualizada o eliminada.
	 */
	//crea una sublinea
	final public function crearSublinea(){
		if($this->sublinea == null){
			throw new Exception('sublinea sin datos');
		}
		DataAccess::write($this->sublinea);	
	}
	
	//modifica una sublinea existente
	final protected function modificarSublinea(){
		if($this->sublinea != null){
			throw new Exception('Sublinea sin datos');
		}
		DataAccess::update($this->sublinea);	
	}  

	//Elimina una sublinea existente
	final protected function eliminar(){
		if($this->sublinea != null){
			throw new Exception('Sublinea sin datos');
		}
		DataAccess::delete($this->sublinea);	
	}
	
	final protected function consultarSublineas()
	{
		return DataAccess::selectWhere($this->sublinea, " ");
	}
    
    final protected function getLineas($allData = false) {
        $linea = new Linea();
        $lineas = DataAccess::selectWhere($linea);
        
        if($allData)
        {
            return $lineas;
        }
        
        $count = count($lineas);
        for ($index = 0; $index < $count; $index++) {
            //array asociativo idempresa-nombre
            $id_Linea[$lineas[$index]['idlinea']] = $lineas[$index]['nombre'];
        }
        return $id_Linea;
    }
}
?>