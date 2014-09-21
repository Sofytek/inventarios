<?php
    require 'ControlSublinea.php';

class HCsublinea extends ControlSublinea
{
	public function __construct($session)
	{
		parent::__construct($session);
	}

	public function cargarSublinea($arrsublinea)
	{
		parent::setSublinea($arrsublinea);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarSublineas();
	}

	public function obtenerSublineaXid($idslinea)
	{
		return $result = parent::consultarSublineaXid($idslinea);
	}

    final public function obtenerLineas($allData = false) 
    {
        return parent::getLineas($allData);
    }
}
?>
