<?php

require 'ControlLinea.php';

class HClinea extends ControlLinea{

	public function __construct($session)
	{
		parent::__construct($session);
	}

	 public function __destruct()
    {
        parent::__destruct();
    }

	public function cargarLinea($arrlinea)
	{
		parent::setLinea($arrlinea);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarLinea();
	}

	public function obtenerLineaXid($idlinea)
	{
		return $result = parent::consultarLineasXid($idlinea);
	}

}
?>