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
	protected $roles;

	public function __construct($session) {
		Tools::thisException("session No valida",$session == null);   
        Tools::thisException("Usuario No valido",$session['Usuario'] == null ||
             $session['logon'] != TRUE);
         /*
		if ($session == null){
			throw new Exception("session No valida"); 
		}elseif($session['Usuario'] == null || $session['logon'] != TRUE) {
			throw new Exception("Usuario No valido");
		}*/
		$conex = new Conexion();
		$conex->conectar();
		DataAccess::setConexion($conex);
        $roles = $session['roles'];	
	}

	public function __destruct() {
		if (self::$conex) {
			$conex -> desconectar();
		}
	}

	public function login(&$session, $name, $password) {
		Tools::thisException ("Usuario o password nulo",$name == null || $password == null);
         
		//crea y da la conexion al dataAccess  
        $conex = new Conexion();
		$conex -> conectar();
		DataAccess::setConexion($conex);
		
		$this -> usuario= new Usuario($name, $password);

       	if (DataAccess::Login($this -> usuario)) 
       	{
			Tools::thisException('Usuario Inactivo',!$this -> usuario -> getActivo());
			
			$session['id'] = $this -> usuario -> getIdUsuario();
			$session['Usuario'] = $this -> usuario -> getNombres(). " " . $this -> usuario -> getApellidos();
			$session['logon'] = TRUE; 
			$this->getRoles($session);
			return TRUE;
		}
		else
		{
			Tools::thisException('Usuario no encontrado');
		}
	}

	private final function getRoles(&$session) {
		$rolesUsuario = new Rol();
		$roles = DataAccess::selectWhere($rolesUsuario, $usuario -> idUsuario);
   
		$count = count($roles);
		for ($i = 0; $i < $count; $i++) {
			$rolname = RolNames::getName($roles['id_rol_roles']);
			$rolesNames[] = $rolname;
           	$rolesModulo[$rolname.'_reg'] = ($roles['registrar'])?1:0;
			$rolesModulo[$rolname.'_mod'] = ($roles['modificar'])?1:0;
			$rolesModulo[$rolname.'_con'] = ($roles['consultar'])?1:0;		
		}
        $session['roles'] = $rolesModulo;
        $session['rolesName'] = $rolesNames;
	}
}
?>