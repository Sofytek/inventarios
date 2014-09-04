<?php
require 'ControlUsuario.php';
class HCempresa extends ControlUsuario{

	public function __construct($session){
		parent::__construct($session);
	}

	public function cargarUsuario($arrayUsuario){
		parent::setUsuario($arrayUsuario);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarEmpresas();
	}

}
?>