<?php
require_once ('Tools.php');
require_once ('../bdcontrol/IDataAccess.php');

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
	
	public function getApellidos(){
		return $this->apellidos;
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

	public function setData($arrayData)
	{
		$this-> idUsuario = Tools::validate($arrayData['idusuario']);
		$this-> nombres = Tools::validate($arrayData['nombres']);
		$this-> apellidos = Tools::validate($arrayData['apellidos']);
		$this-> usuario = Tools::validate($arrayData['usuario']);
		$this-> correo = Tools::validate($arrayData['correo']);
		$this-> contrasenia = Tools::validate($arrayData['contrasenia']);
		$this-> cedula = Tools::validate($arrayData['cedula']);
		$this-> direccion = Tools::validate($arrayData['direccion']);
		$this-> ciudad = Tools::validate($arrayData['ciudad']);
		$this-> telefono = Tools::validate($arrayData['telefono']);
		$this-> activo = Tools::validate($arrayData['activo']);
		$this-> idEmpresa = Tools::validate($arrayData['idEmpresa']);
		$this-> idDependencia = Tools::validate($arrayData['idDependencia']);
		$this-> idSeccion = Tools::validate($arrayData['idSeccion']);
		$this-> idRol = Tools::validate($arrayData['idRol']);
	}
}

?>