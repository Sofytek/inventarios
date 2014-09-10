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
    
    final public function getEmpresas($allData = false)
    {
        return parent::getEmpresas($allData);
    }

}
?>