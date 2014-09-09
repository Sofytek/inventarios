<?php
require_once 'SystemControl.php';
require_once '../Model/Empresa.php';

abstract class ControlEmpresa extends SystemControl {
    private $empresa;
    public function __construct($session) {
        parent::__construct($session);
        $this -> empresa = null;
    }

    public function __destruct() {
        parent::__destruct();
    }

    public function setEmpresa($arrempresa) {
        $this -> empresa = new Empresa($arrempresa);
    }

    /**
     *$empresa deve estar cargado previamente para
     *poder ser creada, actualizada o eliminada.
     */

    //crea una empresa
    final public function crearEmpresa() {

        Tools::thisException('Usuario sin privilejios', !parent::$roles['Empresa_reg']);
        Tools::thisException('Empresa sin datos', $this -> empresa == null);

        DataAccess::write($this -> empresa);
        echo TRUE;
    }

    //modifica una empresa existente
    final protected function modificarEmpresa() {    
        Tools::thisException('Empresa sin datos',$this -> empresa != null);
        DataAccess::update($this -> empresa);
    }

    //Elimina una empresa existente
    final protected function eliminar() {
        Tools::thisException('Empresa sin datos',$this -> empresa != null);
        DataAccess::delete($this -> empresa);
    }

    final protected function consultarEmpresas() {
        return DataAccess::selectWhere($this -> empresa);
    }

}
?>