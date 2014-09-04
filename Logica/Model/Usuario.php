<?php
require_once ('../bdcontrol/IDataAccess.php');
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/IDataAccess.php";

class Usuario implements IDataAccess{
		
	// db data
	private $idUsuario;
	private $nombres;
	private $apellidos;
	private $usuario;
	private $correo;
	private $contrasenia;
	private $cedula;
	private $direccion;
	private $ciudad;
	private $telefono;
	private $activo;
	private $idEmpresa;
	private $idDependencia;
	private $idSeccion;
	private $idRol;
	
	//class data
	private $roles;

    
    public function __construct($usuario = '', $contrasenia = '')	
	{
		$this-> usuario = $usuario;
		$this-> contrasenia = $contrasenia;
        $this-> idUsuario ="";
        $this-> nombres ="";
        $this-> apellidos ="";
        $this-> correo ="";
        $this-> cedula ="";
        $this-> direccion ="";
        $this-> ciudad ="";
        $this-> telefono ="";
        $this-> activo ="";
        $this-> idEmpresa ="";
        $this-> idDependencia ="";
        $this-> idSeccion ="";
        $this-> idRol ="";
	}
	
	//Setters and Getters
	Public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getIdUsuario(){
		return $this->idUsuario; 
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	function getNombres(){
		return $this->nombres;
	}

	public function setActivo($activo){
		$this->activo = $activo;
	}

	public function getActivo(){
		return $this-> activo;
	}
	
	public function setContrasenia($contrasenia){
		$this->contrasenia = $contrasenia;
	}

	public function getContrasenia(){
		return $this->contrasenia;
	}
	

	//implementacion de los metodos de IDataAcces
	public function getTitle(){
		return "usuarios";
	}

	public function getData(){
        $columName = array("idUsuario", "nombres", "apellidos", "usuario", "correo", 
			"contrasenia", "cedula", "direccion", "ciudad", "telefono", "activo", "idEmpresa", 
			"idDependencia", "idSeccion", "idRol");
		$values = array($this-> idUsuario, $this-> nombres, $this-> apellidos, $this-> usuario, $this-> correo,
			$this-> contrasenia, $this-> cedula, $this-> direccion, $this-> ciudad, $this-> telefono, $this-> activo,
			$this-> idEmpresa, $this-> idDependencia, $this-> idSeccion, $this-> idRol);
    	return array($columName, $values);
	}

	public function setData($arrayData){
		$this-> idUsuario = $arrayData[0];
		$this-> nombres = $arrayData[1];
		$this-> apellidos = $arrayData[2];
		$this-> usuario = $arrayData[3];
		$this-> correo = $arrayData[4];
		$this-> contrasenia = $arrayData[5];
		$this-> cedula = $arrayData[6];
		$this-> direccion = $arrayData[7];
		$this-> ciudad = $arrayData[8];
		$this-> telefono = $arrayData[9];
		$this-> activo = $arrayData[10];
		$this-> idEmpresa = $arrayData[11];
		$this-> idDependencia = $arrayData[12];
		$this-> idSeccion = $arrayData[13];
		$this-> idRol = $arrayData[14];
	}
}

?>