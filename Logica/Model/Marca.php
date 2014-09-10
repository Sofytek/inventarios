<?php
require_once ('Tools.php');
require_once ('../bdcontrol/IDataAccess.php');

class Marca implements IDataAccess{

	private $idMarca;
	private $nombre;
	private $activo;
	
	public function __construct($arrmarca = null){
		if($arrmarca != null)
		{
			$this->setData($arrmarca);
		}
	}
	
	//Setters and Getters
	Public function setIdMarca($idMarca){
		$this->idMarca = $idMarca;
	}

	public function getIdMarca(){
		return $idMarca; 
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function &getNombre(){
		return $nombre;
	}

	public function setActivo($activo){
		$this->activo = $activo;
	}

	public function getActivo(){
		return $activo;
	}

	//implementacion de los metodos de IDataAcces
	public function getTitle(){
		return "marcas";
	}

	public function getData()
	{
		$columName = array("idmarca", "nombre", "activo");
		$values = array($this->idMarca, $this->nombre, $this->activo);
    	return array($columName, $values);
	}

	public function setData($arrayData)
	{
		$this->idLinea = Tools::validate($arrayData['idmarca']);
		$this->nombre = Tools::validate($arrayData['nombre']);
		$this->activo = Tools::validate($arrayData['activo']);
	}
}

?>