<?php
require 'ControlUsuario.php';
class HCusuario extends ControlUsuario{

	public function __construct($session){
		parent::__construct($session);
	}

	public function cargarUsuario($arrayUsuario){
		parent::setUsuario($arrayUsuario);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarUsuarios();
	}
	
	public function ObtenerSecciones($allData)
    {
        return parent::getSecciones($allData);
    }
	
	public function ObtenerDependencias($allData = false)
    {
        return parent::getDependencias($allData);
    }

}
?>