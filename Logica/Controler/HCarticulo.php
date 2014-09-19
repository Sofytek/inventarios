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

	public function ObtenerMarcas($allData)
    {
        return parent::getMarcas($allData);
    }
	
	public function ObtenerSecciones($allData)
    {
        return parent::getSecciones($allData);
    }

	public function ObtenerSublineas($allData)
    {
        return parent::getSublineas($allData);
    }

}
?>