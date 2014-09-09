<?php
    require_once ('../bdcontrol/IDataAccess.php');
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/IDataAccess.php";

class Seccion implements IDataAccess{

	private $idSeccion;
	private $nombre;
	private $activo;
	private $dependencia;
	private $direccion;
	private $telefono;	
	private $bodega;
	private $ccAdmin;
	
	public function __construct($arrseccion = null){
		if($arrseccion != null)
		{
			$this->setData($arrseccion);
		}
	}
	
	//Setters and Getters
	Public function setIdSeccion($idSeccion){
		$this->$idSeccion = $idSeccion;
	}

	public function getIdSeccion(){
		return $idSeccion; 
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $nombre;
	}

	public function setActivo($activo){
		$this->activo = $activo;
	}

	public function getActivo(){
		return $activo;
	}
	
	public function setDependencia($dependencia){
		$this->$dependencia = $dependencia;
	}

	public function getDependencia(){
		return $dependencia;
	}
	
	public function setDireccion($direccion){
		$this->$direccion = $direccion;
	}

	public function getDireccion(){
		return $direccion;
	}
	
	public function setTelefono($telefono){
		$this->$telefono = $telefono;
	}

	public function getTelefono(){
		return $telefono;
	}
	
	public function setBodega($bodega){
		$this->$bodega = $bodega;
	}

	public function getBodega(){
		return $bodega;
	}
	
	public function setCcAdmin($ccAdmin){
		$this->$ccAdmin = $ccAdmin;
	}

	public function getCcAdmin(){
		return $ccAdmin;
	}

	//implementacion de los metodos de IDataAcces
	public function getTitle(){
		return "secciones";
	}

	public function getData()
	{
		$columName = array("idseccion", "nombre", "activo", "iddependencia", "direccion", "telefono", "bodega", "cc_admin");
		$values = array($this->idSeccion, $this->nombre, $this->activo, $this->dependencia, $this->direccion, $this->telefono, $this->bodega, $this->ccAdmin);
    	return array($columName, $values);
	}

	public function setData($arrayData)
	{
		$this->idSeccion = $arrayData['idseccion'];
		$this->nombre = $arrayData['nombre'];
		$this->activo = $arrayData['activo'];
		$this->dependencia = $arrayData['iddependencia'];
		$this->direccion = $arrayData['direccion'];
		$this->telefono = $arrayData['telefono'];
		$this->bodega = $arrayData['bodega'];
		$this->ccAdmin = $arrayData['cc_admin'];
	}
}
    
?>