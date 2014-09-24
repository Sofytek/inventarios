<?php

require 'ControlMarca.php';

class HCmarca extends ControlMarca
{

	public function __construct($session)
	{
		parent::__construct($session);
	}

	public function __destruct()
    {
        parent::__destruct();
    }

	public function cargarMarca($arrmarca)
	{
		parent::setMarca($arrmarca);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarMarcas();
	}

	public function obtenerMarcaXid($idempresa)
	{
		return $result = parent::consultarEmpresasXid($idempresa);
	}
}
?>