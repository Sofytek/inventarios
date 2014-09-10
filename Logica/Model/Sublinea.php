<?php
	require_once ('Tools.php');
    require_once ('../bdcontrol/IDataAccess.php');

class Sublinea implements IDataAccess{

	private $idSublinea;
	private $nombre;
	private $activo;
	private $idLinea;
	
	public function __construct($arrsublinea = null)
	{
		if($arrsublinea != null)
		{
			$this->setData($arrsublinea);
		}
	}
	
	//Setters and Getters
	Public function setIdSublinea($idSublinea)
	{
		$this->$idSublinea = $idSublinea;
	}

	public function getIdSublinea()
	{
		return $idSublinea; 
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getNombre()
	{
		return $nombre;
	}

	public function setActivo($activo)
	{
		$this->activo = $activo;
	}

	public function getActivo()
	{
		return $activo;
	}
	
	public function setIdLinea($idLinea)
	{
		$this->$idLinea = $idLinea;
	}

	public function getIdLinea()
	{
		return $idLinea;
	}
	
	//implementacion de los metodos de IDataAcces
	public function getTitle()
	{
		return "sublineas";
	}

	public function getData()
	{
		$columName = array("idslinea", "nombre", "activo", "idlinea");
		$values = array($this->idSublinea, $this->nombre, $this->activo, $this->idLinea);
    	return array($columName, $values);
	}

	public function setData($arrayData)
	{
		$this->idSublinea = Tools::validate($arrayData['idslinea']);
		$this->nombre = Tools::validate($arrayData['nombre']);
		$this->activo = Tools::validate($arrayData['activo']);
		$this->idLinea = Tools::validate($arrayData['idlinea']);
	}
}
    
?>