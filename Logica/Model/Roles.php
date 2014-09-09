<?php
require_once ('Tools.php');
require_once ('../bdcontrol/IDataAccess.php');

/**
 *
 */
class Rol implements IDataAccess {
    private $idRol;
    private $idRolUsuario;
    private $idUsuario;
    private $registrar;
    private $modificar;
    private $consultar;

    function __construct($data = null) {
        $this -> setData($data);
    }

    public function setIdRol($idRol) {
        $this -> idRol = $idRol;
    }

    public function getIdRol() {
        return $this -> idRol;
    }

    public function setIdRolUsuario($idRolUsuario) {
        $this -> idRolUsuario = $idRolUsuario;
    }

    public function getIdRolUsuario() {
        return $this -> idRolUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this -> idUsuario = $idUsuario;
    }

    public function getIdUsuario() {
        return $this -> idUsuario;
    }

    //implementacion de los metodos de IDataAcces
    public function getTitle() {
        return "rol_usuario";
    }

    public function getData() {
        $columName = array("id_rolusuario", "idusuario_usuarios", "id_rol_roles", "registrar", "modificar", "consultar");
        $values = array($this -> idRolUsuario, $this -> idUsuario, $this -> idRol, $this -> registrar, $this -> modificar, $this -> consultar);
        return array($columName, $values);
    }

    public function setData($arrayData) {
        $this -> idRolUsuario = Tools::validate($arrayData['id_rolusuario']);
        $this -> idUsuario = Tools::validate($arrayData['idusuario_usuarios']);
        $this -> idRol = Tools::validate($arrayData['id_rol_roles']);
        $this -> registrar = Tools::validate($arrayData['registrar']);
        $this -> modificar = Tools::validate($arrayData['modificar']);
        $this -> consultar = Tools::validate($arrayData['consultar']);
    }

}
?>