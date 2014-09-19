<?php
require_once ('Tools.php');
require_once ('../bdcontrol/IDataAccess.php');

class Solicitud implements IDataAccess{

	private $idSolicitud;
	private $nota;
  	private $tipo;
  	private $fecha;
  	private $estado;
  	private $solicitante;
  	private $idUsuario;
  	private $idDependencia;
  	private $idSeccion;
  	private $notaEnvio;
  	private $fechaEnvio;
	
	public function __construct($arrsolicitud = null){
		if($arrsolicitud != null)
		{
			$this->setData($arrsolicitud);
		}
	}
	
	//Setters and Getters
	Public function setIdSolicitud($idSolicitud){
		$this->idSolicitud = $idSolicitud;
	}

	public function getIdSolicitud(){
		return $idSolicitud; 
	}

	public function setNota($nota){
		$this->nota = $nota;
	}

	function getNota(){
		return $nota;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getTipo(){
		return $tipo;
	}
	
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	function getFecha(){
		return $fecha;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	function getEstado(){
		return $estado;
	}

	public function setSolicitante($solicitante){
		$this->solicitante = $solicitante;
	}

	function getSolicitante(){
		return $solicitante;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	function getIdUsuario(){
		return $idUsuario;
	}

	public function setIdDependencia($idDependencia){
		$this->idDependencia = $idDependencia;
	}

	function getFecha(){
		return $idDependencia;
	}

	public function setIdSeccion($idSeccion){
		$this->idSeccion = $idSeccion;
	}

	function getIdSeccion(){
		return $idSeccion;
	}

	public function setNotaEnvio($notaEnvio){
		$this->notaEnvio = $notaEnvio;
	}

	function getNotaEnvio(){
		return $notaEnvio;
	}

	public function setFechaEnvio($fechaEnvio){
		$this->fechaEnvio = $fechaEnvio;
	}

	function getFechaEnvio(){
		return $fechaEnvio;
	}

	//implementacion de los metodos de IDataAcces
	public function getTitle(){
		return "solicitud";
	}

	public function getData()
	{
		$columName = array("idsolicitud", "nota", "tipo", "fecha", "estado", "solicitante", "idusuario", "iddependencia", "idseccion", "notaenvio", "fechaenvio");
		$values = array($this->idSolicitud, $this->nota, $this->tipo, $this->fecha, $this->estado, $this->solicitante, $this->idUsuario, $this->idDependencia, $this->idSeccion, $this->notaEnvio, $this->fechaEnvio);
    	return array($columName, $values);
	}

	public function setData($arrayData)
	{
		$this->idSolicitud = Tools::validate($arrayData['idsolicitud']);
		$this->nota = Tools::validate($arrayData['nota']);
		$this->tipo = Tools::validate($arrayData['tipo']);
		$this->fecha = Tools::validate($arrayData['fecha']);
		$this->estado = Tools::validate($arrayData['estado']);
		$this->solicitante = Tools::validate($arrayData['solicitante']);
		$this->idUsuario = Tools::validate($arrayData['idusuario']);
		$this->idDependencia = Tools::validate($arrayData['iddependencia']);
		$this->idSeccion = Tools::validate($arrayData['idseccion']);
		$this->notaEnvio = Tools::validate($arrayData['notaenvio']);
		$this->fechaEnvio = Tools::validate($arrayData['fechaenvio']);
	}
}

?>