<?php
require_once ('../bdcontrol/Conexion.php');
require_once ('../model/Usuario.php');
require_once ('../model/Roles.php');
require_once ('../bdcontrol/DataAcces.php');

abstract class SystemControl {
	static protected $conex;
	private $usuario;
	protected $rolesSession;
	protected $menuSession;

	public function __construct($session) {
		if ($session == null){
			throw new Exception("session No valida"); 
		}elseif($session['Usuario'] == null || $session['logon'] != TRUE) {
			throw new Exception("Usuario No valido");
		}else
		$conex = new Conexion();
		$conex->conectar();
		DataAccess::setConexion($conex);	
	}

	public function __destruct() {
		if (self::$conex) {
			$conex -> desconectar();
		}
	}

	public function login(&$session, $name, $password) {
		if ($name == null || $password == null) {
			throw new Exception ("Usuario o password nulo");
		}
		 
		//crea y da la conexion al dataAccess  
        $conex = new Conexion();
		$conex -> conectar();
		DataAccess::setConexion($conex);
		
		$this -> usuario= new Usuario($name, $password);

       	if (DataAccess::Login($this -> usuario)) 
       	{
			if (!$this -> usuario -> getActivo()) 
			{
				throw new Exception('Usuario Inactivo');
			}
			
			$session['id'] = $this -> usuario -> getIdUsuario();
			$session['Usuario'] = $this -> usuario -> getNombres(). " " . $this -> usuario -> getApellidos();
			$session['logon'] = TRUE; 
			//$this->getRoles();
			return TRUE;
		}
		else
		{
			throw new Exception('Usuario no encontrado');
		}
	}

	private function getRoles() {
		$rolesUsuario = new Rol();
		$roles = DataAccess::selectWhere($rolesUsuario, $usuario -> idUsuario);

		$count = count($roles);
		for ($i = 0; $i < $count; $i++) {
			$rolname = NameRoles::getName($roles['id_rol_roles']);
			$rolUsuario = new Rol($roles);
			$rolesSession[$rolname] = $rolUsuario;
			$menuSession[$rolname] = $rolname;
		}
	}
}
?>