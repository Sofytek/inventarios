<?php

require 'ControlEstadoArticulo.php';

class HCEstadoArticulo extends ControlEstadoArticulo{

	public function __construct($session){
		parent::__construct($session);
	}

	public function cargarEstadoArticulo($arrestadoArticulo){
		parent::setEstadoArticulo($arrestadoArticulo);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarEstadoArticulo();
	}
	
	public function obtenerEstadoArticuloXid($idestadoArticulo)
	{
		return $result = parent::consultarEstadoArticuloXid($idestadoArticulo);
	}
    
}
?>