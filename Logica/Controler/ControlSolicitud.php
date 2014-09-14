<?php
require_once 'SystemControl.php';
require_once '../Model/Solicitud.php';
require_once '../Model/Usuario.php';
require_once '../Model/Dependencia.php';
require_once '../Model/Seccion.php';

abstract class ControlSolicitud extends SystemControl 
{
    private $solicitud;

    public function __construct($session) 
    {
        parent::__construct($session);
        $this -> solicitud = null;
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function setSolicitud($arrsolicitud)
    {
        $this -> solicitud = new Solicitud($arrsolicitud);
    }

    /*
     *$Solicitud debe estar cargado previamente para
     *poder ser creada, actualizada o eliminada.
     */
    //crea una solicitud
    final public function crearSolicitud() 
    {
        if ($this -> solicitud == null) 
        {
            throw new Exception('Solicitud sin datos');
        }
        DataAccess::write($this -> solicitud);

    }

    //modifica una solicitud existente
    final protected function modificarSolicitud() 
    {
        if ($this -> solicitud != null) 
        {
            throw new Exception('Solicitud sin datos');
        }
        DataAccess::update($this -> solicitud);
    }

    //Elimina una Solicitud existente
    final protected function eliminar() 
    {
        if ($this -> solicitud != null)
        {
            throw new Exception('Solicitud sin datos');
        }
        DataAccess::delete($this -> solicitud);
    }

    final protected function consultarSolicitudes() {
        return DataAccess::selectWhere($this -> solicitud, " ");
    }

    final protected function getUsuario($allData = false) {
        $usuario = new Usuario();
        $usuarios=  DataAccess::selectWhere($usuario);
        
        if ($allData) {
            return $usuarios;
        }
        
        $count = count($usuarios);
        for ($index = 0; $index < $count; $index++) {
            //array asociativo idusuario-nombre
            $id_Usuario[$usuarios[$index]['idusuario']] = $usuarios[$index]['apellidos'];
        }
        return $id_Usuario;
    }

    final protected function getDependencia($allData = false)
    {
        $dependencia = new Dependencia();
        $dependencias=  DataAccess::selectWhere($dependencia);
        
        if ($allData) {
            return $dependencias;
        }
        
        $count = count($dependencias);
        for ($index = 0; $index < $count; $index++) {
            //array asociativo iddependencia-nombre
            $id_Dependencia[$dependencias[$index]['iddependencia']] = $dependencias[$index]['nombre'];
        }
        return $id_Dependencia;
    }

    final protected function getSeccion($allData = false)
    {
        $seccion = new Seccion();
        $secciones=  DataAccess::selectWhere($seccion);
        
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

}
?>