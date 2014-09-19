<?php

require 'ControlSolicitud.php';

class HCsolicitud extends ControlSolicitud{

	public function __construct($session)
	{
		parent::__construct($session);
	}

	public function cargarSolicitud($arrsolicitud)
	{
		parent::setSolicitud($arrsolicitud);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarSolicitud();
	}
    
    final public function obtenerUsuario($allData = false)
    {
        return parent::getUsuario($allData);
    }

    final public function obtenerDependencia($allData = false)
    {
        return parent::getDependencia($allData);
    }

    final public function obtenerSeccion($allData = false)
    {
        return parent::getSeccion($allData);
    }

}