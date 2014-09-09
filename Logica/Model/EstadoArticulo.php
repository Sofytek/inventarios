<?php
require_once ('../bdcontrol/IDataAccess.php');
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/IDataAccess.php";

class EstadoArticulo implements IDataAccess{

	private $idEstado;
	private $nombre;
	private $activo;
	
	public function __construct($arrestadoArticulo = null){
		if($arrestadoArticulo != null)
		{
			$this->setData($arrestadoArticulo);
		}
	}
	
	//Setters and Getters
	Public function setIdEstadoArticulo($idEstado){
		$this->$idEstado = $idEstado;
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
	
	//implementacion de los metodos de IDataAcces
	public function getTitle(){
		return "estadoarticulo";
	}

	public function getData()
	{
		$columName = array("id_estado", "nombre", "activo");
		$values = array($this->idEstado, $this->nombre, $this->activo);
    	return array($columName, $values);
	}

	public function setData($arrayData)
	{
		$this->idEstado = $arrayData['id_estado'];
		$this->nombre = $arrayData['nombre'];
		$this->activo = $arrayData['activo'];
	}
}

?>