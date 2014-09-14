<?php
    require 'ControlSeccion.php';

class HCSeccion extends ControlSeccion{

	public function __construct($session){
		parent::__construct($session);
	}

	public function cargarSeccion($arrseccion){
		parent::setSeccion($arrseccion);
	}
	
	public function obtenerConsulta()
	{
		return $result = parent::consultarSecciones();
	}
    
    public function ObtenerDependencias($allData = false)
    {
        return parent::getDependencias($allData);
    }

}
?>	