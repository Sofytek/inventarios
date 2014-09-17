<?php

require 'ControlDependencia.php';

class HCDependencia extends ControlDependencia{

	public function __construct($session){
		parent::__construct($session);
	}

	public function cargarDependencia($arrdependencia){
		parent::setDependencia($arrdependencia);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarDependencias();
	}
	
	public function obtenerDependenciaXid($iddependencia)
	{
		return $result = parent::consultarDependenciasXid($iddependencia);
	}
    
    final public function obtenerEmpresa($allData = false)
    {
        return parent::getEmpresas($allData);
    }

}
?>