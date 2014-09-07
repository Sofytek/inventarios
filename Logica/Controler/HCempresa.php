<?php
require 'ControlEmpresa.php';
class HCempresa extends ControlEmpresa{

	public function __construct($session){
		parent::__construct($session);
	}

	public function cargarEmpresa($arrempresa){
		parent::setEmpresa($arrempresa);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarEmpresas();
	}

}
?>