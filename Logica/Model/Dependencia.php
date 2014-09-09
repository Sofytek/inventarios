<?php
require_once ('../bdcontrol/IDataAccess.php');
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/IDataAccess.php";

class Dependencia implements IDataAccess{

	private $idDependencia;
	private $nombre;
	private $activo;
	private $empresa;
	
	public function __construct($arrdependencia = null){
		if($arrdependencia != null)
		{
			$this->setData($arrdependencia);
		}
	}
	
	//Setters and Getters
	Public function setIdDependencia($idDependencia){
		$this->idDependencia = $idDependencia;
	}

	public function getIdDependencia(){
		return $idDependencia; 
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
	
	public function setEmpresa($empresa){
		$this->empresa = $empresa;
	}

	function &getEmpresa(){
		return $empresa;
	}

	//implementacion de los metodos de IDataAcces
	public function getTitle(){
		return "dependencias";
	}

	public function getData()
	{
		$columName = array("iddependencia", "nombre", "activo", "idempresa");
		$values = array($this->idDependencia, $this->nombre, $this->activo, $this->empresa);
    	return array($columName, $values);
	}

	public function setData($arrayData)
	{
		$this->idDependencia = $arrayData['iddependencia'];
		$this->nombre = $arrayData['nombre'];
		$this->activo = $arrayData['activo'];
		$this->empresa = $arrayData['idempresa'];
	}
}

?>