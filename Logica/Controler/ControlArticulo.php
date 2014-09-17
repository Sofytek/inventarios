<?php
    require_once 'SystemControl.php';
	require_once '../Model/Articulo.php';
	require_once '../Model/Seccion.php';
	require_once '../Model/Marca.php';
	require_once '../Model/Sublinea.php';


abstract class ControlArticulo extends SystemControl
{
	private $articulo;

	public function __construct($session)
	{
		parent::__construct($session);
		$this->articulo = null;
	}

	public function __destruct()
	{
        parent::__destruct();
    }

	public function setArticulo($arrarticulo){
		$this->articulo = new Articulo($arrarticulo);		
	}

	/*
	 *$articulo debe estar cargado previamente para
	 *poder ser creada, actualizada o eliminada.
	 */
	//crea una articulo
	final public function crearArticulo(){
		if($this->articulo == null){
			throw new Exception('Articulo sin datos');
		}
		DataAccess::write($this->articulo);
		
	}
	
	//modifica una articulo existente
	final protected function modificarArticulo(){
		if($this->articulo != null){
			throw new Exception('Articulo sin datos');
		}
		DataAccess::update($this->articulo);	
	}  

	//Elimina una articulo existente
	final protected function eliminar(){
		if($this->articulo != null){
			throw new Exception('articulo sin datos');
		}
		DataAccess::delete($this->articulo);	
	}
	
	final protected function consultarArticulos()
	{
		return DataAccess::selectWhere($this->articulo, " ");
	}
	
	final protected function getMarcas($allData = false) {
        $marca = new Marca();
        $marcas=  DataAccess::selectWhere($marca);
        
        if ($allData) {
            return $marcas;
        }
        
        $count = count($marcas);
        for ($index = 0; $index < $count; $index++) {
            //array asociativo idmarca-nombre
            $id_Marca[$marcas[$index]['idmarca']] = $marcas[$index]['nombre'];
        }
        return $id_Marca;
    }
	
	final protected function getSecciones($allData = false) {
        $seccion = new Seccion();
        $secciones =  DataAccess::selectWhere($seccion);
        
        if ($allData) {
            return $secciones;
        }
        
        $count = count($secciones);
        for ($index = 0; $index < $count; $index++) {
            //array asociativo idseccion-nombre
            $id_Seccion[$secciones[$index]['idseccion']] = $secciones[$index]['nombre'];
        }
        return $id_Seccion;
    }
	
	final protected function getSublineas($allData = false) {
        $sublinea = new Sublinea();
        $sublineas =  DataAccess::selectWhere($sublinea);
        
        if ($allData) {
            return $sublineas;
        }
        
        $id_Sublinea = NULL;
        $count = count($sublineas);
        for ($index = 0; $index < $count; $index++) {
            //array asociativo idsublinea-nombre
            $id_Sublinea[$sublineas[$index]['idsublinea']] = $sublineas[$index]['nombre'];
        }
        return $id_Sublinea;
    }
	
}
?>