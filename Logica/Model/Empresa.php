<?php
require_once ('../Tools/Tools.php');
require_once ('../bdcontrol/IDataAccess.php');

class Empresa implements IDataAccess{

	private $idEmpresa;
	private $nombre;
	private $activo;

	public function __construct($arrempresa = null){
		if($arrempresa != null)
		{
			$this->setData($arrempresa);
		}
	}
	
	//Setters and Getters
	public function setIdEmpresa($idEmpresa){
		$this->idEmpresa = $idEmpresa;
	}

	public function getIdEmpresa(){
		return $this -> idEmpresa; 
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
		return "Empresa";
	}

	public function getData()
	{
		$columName = array("idempresa", "nombre", "activo");
		$values = array($this->idEmpresa, $this->nombre, $this->activo);
    	return array($columName, $values);
	}

	public function setData($arrayData)
	{
		$this->idEmpresa = $arrayData['idempresa'];
		$this->nombre = $arrayData['nombre'];
		$this->activo = $arrayData['activo'];
	}
}

?>