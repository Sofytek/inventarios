<?php
require_once 'SystemControl.php';
require_once '../Model/Dependencia.php';
require_once '../Model/Empresa.php';

abstract class ControlDependencia extends SystemControl {
    private $dependencia;
    public function __construct($session) {
        parent::__construct($session);
        $this -> dependencia = null;
    }

    public function setDependencia($arrdependencia) {
        $this -> dependencia = new Dependencia($arrdependencia);
    }

    /*
     *$dependencia debe estar cargado previamente para
     *poder ser creada, actualizada o eliminada.
     */
    //crea una dependencia
    final public function crearDependencia() {
        if ($this -> dependencia == null) {
            throw new Exception('Dependencia sin datos');
        }
        DataAccess::write($this -> dependencia);

    }

    //modifica una dependencia existente
    final public function modificarDependencia() {
        if ($this -> dependencia == null) {
            throw new Exception('Dependencia sin datos');
        }
        DataAccess::update($this -> dependencia);
    }

    //Elimina una dependencia existente
    final protected function eliminar() {
        if ($this -> dependencia != null) {
            throw new Exception('Dependencia sin datos');
        }
        DataAccess::delete($this -> dependencia);
    }

    final protected function consultarDependencias() {
        return DataAccess::selectWhere($this -> dependencia, " ");
    }
	
	final protected function consultarDependenciasXid($iddependencia)
	{
        $this->dependencia ->setIdDependencia($iddependencia);	
    	DataAccess::read($this->dependencia);
		
    	return $this -> dependencia -> getData()[1];
	}

    final protected function getEmpresas($allData = false) {
        $empresa = new Empresa();
        $empresas=  DataAccess::selectWhere($empresa);
        
        if ($allData) {
            return $empresas;
        }
        
        $count = count($empresas);
        for ($index = 0; $index < $count; $index++) {
            //array asociativo idempresa-nombre
            $id_Empresa[$empresas[$index]['idempresa']] = $empresas[$index]['nombre']; //id_Empresa[idempresa] = nombreEmpresa
        }
        return $id_Empresa;
    }

}
?>