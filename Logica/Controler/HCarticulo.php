<?php
    require 'ControlArticulo.php';

class HCarticulo extends ControlArticulo{

	public function __construct($session)
	{
		parent::__construct($session);
	}

	public function cargarArticulo($arrarticulo)
	{
		parent::setArticulo($arrarticulo);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarArticulos();
	}

	public function ObtenerMarcas($allData = false)
    {
        return parent::getMarcas($allData);
    }
	
	public function ObtenerSecciones($allData = false)
    {
        return parent::getSecciones($allData);
    }

	public function ObtenerSublineas($allData = false)
    {
        return parent::getSublineas($allData);
    }

}
?>