<?php
require 'ControlEmpresa.php';
class HCempresa extends ControlEmpresa{

	public function __construct($session){
		parent::__construct($session);
	}

	public function cargarEmpresa($nombre ,$activo){
		parent::setEmpresa($nombre, $activo);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarEmpresas();
	}

}
?>