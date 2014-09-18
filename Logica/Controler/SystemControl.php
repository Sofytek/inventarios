<?php
require_once ('../Tools/Tools.php');
require_once ('../Tools/RolNames.php');
require_once ('../model/Roles.php');
require_once ('../model/Usuario.php');
require_once ('../bdcontrol/Conexion.php');
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
        $rolesSession = $session['roles']['propiedades'];
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
			$session['logon']  = TRUE; 
			$session['roles']  = $this->getRoles();
			return TRUE;
		}
		else
		{
			throw new Exception('Usuario o contraseña no validos');
		}
	}

	private function getRoles() {
		$rolesNames = null;    
		$rolesModulo = null;
        
		$rolesUsuario = new Rol();
		$rolesUsuario -> setIdUsuario($this -> usuario -> getIdUsuario());
		$roles = DataAccess::selectWhere($rolesUsuario, 1);

		$count = count($roles);
		for ($i = 0; $i < $count; $i++) {
			$row = $roles[$i];
			$rolname = RolNames::getName($row['id_rol_rol']);
			$rolesNames[] = $rolname;
			$rolesModulo[$rolname . '_reg'] = ($row['registrar']) ? 1 : 0;
			$rolesModulo[$rolname . '_mod'] = ($row['modificar']) ? 1 : 0;
			$rolesModulo[$rolname . '_con'] = ($row['consultar']) ? 1 : 0;
		}
        $rolesUsuario=null;
		$rolesUsuario['nombres']  = $rolesNames;
		$rolesUsuario['propiedades']  = $rolesModulo;
		return $rolesUsuario;
	}
}
?>