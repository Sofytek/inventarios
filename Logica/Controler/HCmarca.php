<?php

require 'ControlMarca.php';

class HCmarca extends ControlMarca{

	public function __construct($session){
		parent::__construct($session);
	}

	public function cargarMarca($arrmarca){
		parent::setMarca($arrmarca);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarMarcas();
	}

}
?>