<?php
require_once ('../bdcontrol/IDataAccess.php');  
 
 /**
 *
 */
class Rol implements IDataAccess {
	private $idRol;
	private $idRolUsuario;
	private $idUsuario;
	private $registrar;
	private $modificar;
	private $consultar;

	function __construct($idUsuario = null) {
		$this -> idUsuario = $idUsuario;
		$registrar = FALSE;
		$modificar = FALSE;
		$consultar = FALSE;
		
	}

	public function setIdRol($idRol){
		$this -> idRol = $idRol;
	}	

	public function getIdRol(){
		return $this ->idRol;
	}
	
	public function setIdRolUsuario($idRolUsuario){
		$this ->  idRolUsuario = $idRolUsuario;
	}	

	public function getIdRolUsuario(){
		return $this -> idRolUsuario;
	}
	
	public function setIdUsuario($idUsuario){
		$this -> idUsuario = $idUsuario;
	}	

	public function getIdUsuario(){
		return $this -> idUsuario;
	}

	//implementacion de los metodos de IDataAcces
	public function getTitle(){
		return "rol_usuario";
	}
	
	/**
	 * implementar set an get 
	 */

	public function getData(){
		$columName = array("id_rolusuario", "idusuario_usuarios", "id_rol_roles","registrar", "modificar",	"consultar");
		$values = array($this->idRolUsuario, $this->idUsuario, $this->idRol, $this->registrar, $this->modificar,$this->consultar);
    	return array($columName, $values);
	}

	public function setData($arrayData){
		$this->idRolUsuario=$arrayData[0];
		$this->idUsuario=$arrayData[1];
		$this->idRol=$arrayData[2];
		$registrar = $arrayData[3];
		$modificar = $arrayData[4];
		$consultar = $arrayData[5];
	}
}
?>