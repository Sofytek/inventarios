<?php
require_once ('Tools.php');
require_once ('../bdcontrol/IDataAccess.php');

class Linea implements IDataAccess{

	private $idLinea;
	private $nombre;
	private $activo;

	public function __construct($arrlista = null){
		if($arrlista != null)
		{
			$this->setData($arrlista);
		}
	}
	
	//Setters and Getters
	Public function setIdLinea($idLinea){
		$this->idLinea = $idLinea;
	}

	public function getIdLinea(){
		return $idLinea; 
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
		return "Linea";
	}

	public function getData()
	{
		$columName = array("idlinea", "nombre", "activo");
		$values = array($this->idLinea, $this->nombre, $this->activo);
    	return array($columName, $values);
	}

	public function setData($arrayData)
	{
		$this->idLinea = Tools::validate($arrayData['idempresa']);
		$this->nombre = Tools::validate($arrayData['nombre']);
		$this->activo = Tools::validate($arrayData['activo']);
	}
}

?>