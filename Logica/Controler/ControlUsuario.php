<?php
require_once 'SystemControl.php';
require_once '../Model/Usuario.php';
require_once '../Model/Seccion.php';
require_once '../Model/Dependencia.php';
//require_once '../bdcontrol/DataAcces.php';
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/Model/Empresa.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/activosfijos/Logica/bdcontrol/DataAcces.php";

abstract class ControlUsuario extends SystemControl
{
	private $usuario;
	public function __construct($session){
		parent::__construct($session);
		$this->usuario = null;
	}

	public function setUsuario($arrayUsuario){
		$this->usuario = new Usuario();
		$this->usuario->setData($arrayUsuario);		
	}
	
	//crea un ususario
	final public function crearUsuario(){
		if($this->usuario == null){
			throw new Exception('Usuario sin datos');
		}
		DataAccess::write($this->usuario);
		
	}
	
	//modifica un usuario existente
	final protected function modificarUsuario(){
		if($this->empresa != null){
			throw new Exception('Usuario sin datos');
		}
		DataAccess::update($this->usuario);	
	}  

	//Elimina un usuario existente
	final protected function eliminar(){
		if($this->empresa != null){
			throw new Exception('Empresa sin datos');
		}
		DataAccess::delete($this->usuario);	
	}
	
	final protected function consultarUsuarios()
	{
		return DataAccess::selectWhere($this->usuario, " ");
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
	
	final protected function getDependencias($allData = false) {
        $dependencia = new Dependencia();
        $dependencias = DataAccess::selectWhere($dependencia);
        
        if($allData)
        {
            return $dependencias;
        }
        
        $count = count($dependencias);
        for ($index = 0; $index < $count; $index++) {
            //array asociativo idempresa-nombre
            $id_Dependencia[$dependencias[$index]['iddependencia']] = $dependencias[$index]['nombre'];
        }
        return $id_Dependencia;
    }
}
?>