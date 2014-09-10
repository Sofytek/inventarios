<?php
require_once 'SystemControl.php';
require_once '../Model/Seccion.php';
require_once '../Model/Dependencia.php';

abstract class ControlSeccion extends SystemControl {
    private $seccion;
    public function __construct($session) {
        parent::__construct($session);
        $this -> seccion = null;
    }

    public function setSeccion($arrseccion) {
        $this -> seccion = new Seccion($arrseccion);
    }

    /*
     *$seccion debe estar cargado previamente para
     *poder ser creada, actualizada o eliminada.
     */
    //crea una seccion
    final public function crearSeccion() {
        if ($this -> seccion == null) {
            throw new Exception('Seccion sin datos');
        }
        DataAccess::write($this -> seccion);

    }

    //modifica una seccion existente
    final protected function modificarSeccion() {
        if ($this -> seccion != null) {
            throw new Exception('Seccion sin datos');
        }
        DataAccess::update($this -> seccion);
    }

    //Elimina una seccion existente
    final protected function eliminar() {
        if ($this -> seccion != null) {
            throw new Exception('Seccion sin datos');
        }
        DataAccess::delete($this -> seccion);
    }

    final protected function consultarSecciones() {
        return DataAccess::selectWhere($this -> seccion, " ");
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