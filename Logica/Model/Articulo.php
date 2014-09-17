<?php
    require_once ('../bdcontrol/IDataAccess.php');
    require_once ('../Tools/Tools.php');

class Seccion implements IDataAccess{

	private $idArticulo;
	private $nombre;
	private $tipo;
	private $referencia;
	private $unidad;
	private $activo;
	private $idMarca;
	private $idSeccion;
	private $idSublinea;
	private $idEnvio;
	private $activoFijo;
	private $capitalizado;
	private $amorAcumulada;
	private $valContable;
	private $numSerie;
	private $plaqueta;
	private $plaquetaAnt1;
	private $plaquetaAnt2;
	private $supranumero;
	private $ccResponsable;
	
	public function __construct($arrarticulo = null){
		if($arrarticulo != null)
		{
			$this->setData($arrarticulo);
		}
	}
	
	//Setters and Getters
	Public function setIdArticulo($idArticulo){
		$this->$idArticulo = $idArticulo;
	}

	public function getIdArticulo(){
		return $idArticulo; 
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $nombre;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getTipo(){
		return $tipo;
	}

	public function setReferencia($referencia){
		$this->referencia = $referencia;
	}

	public function getReferecia(){
		return $referencia;
	}

	public function setUnidad($unidad){
		$this->unidad = $unidad;
	}

	public function getUnidad(){
		return $unidad;
	}

	public function setActivo($activo){
		$this->activo = $activo;
	}

	public function getActivo(){
		return $activo;
	}
	
	public function setIdMarca($idMarca){
		$this->$idMarca = $idMarca;
	}

	public function getIdMarca(){
		return $idMarca;
	}
	
	public function setIdSeccion($idSeccion){
		$this->$idSeccion = $idSeccion;
	}

	public function getIdSeccion(){
		return $idSeccion;
	}
	
	public function setIdSublinea($idSublinea){
		$this->$idSublinea = $idSublinea;
	}

	public function getIdSublinea(){
		return $idSublinea;
	}
	
	public function setIdEnvio($idEnvio){
		$this->$idEnvio = $idEnvio;
	}

	public function getIdEnvio(){
		return $idEnvio;
	}
	
	public function setActivoFijo($activoFijo){
		$this->$activoFijo = $activoFijo;
	}

	public function getActivoFijo(){
		return $activoFijo;
	}

	public function setCapitalizado($capitalizado){
		$this->$capitalizado = $capitalizado;
	}

	public function getCapitalizado(){
		return $capitalizado;
	}

	public function setAmorAcumulada($amorAcumulada){
		$this->$amorAcumulada = $amorAcumulada;
	}

	public function getAmorAcumulada(){
		return $amorAcumulada;
	}

	public function setValContable($valContable){
		$this->$valContable = $valContable;
	}

	public function getValContable(){
		return $valContable;
	}

	public function setNumSerie($numSerie){
		$this->$numSerie = $numSerie;
	}

	public function getNumSerie(){
		return $numSerie;
	}

	public function setPlaqueta($plaqueta){
		$this->$plaqueta = $plaqueta;
	}

	public function getPlaqueta(){
		return $plaqueta;
	}

	public function setPlaquetaAnt1($plaquetaAnt1){
		$this->$plaquetaAnt1 = $plaquetaAnt1;
	}

	public function getPlaquetaAnt1(){
		return $plaquetaAnt1;
	}

	public function setPlaquetaAnt2($plaquetaAnt2){
		$this->$plaquetaAnt2 = $plaquetaAnt2;
	}

	public function getPlaquetaAnt2(){
		return $plaquetaAnt2;
	}

	public function setSupranumero($supranumero){
		$this->$supranumero = $supranumero;
	}

	public function getSupranumero(){
		return $supranumero;
	}

	public function setCcResponsable($ccResponsable){
		$this->$ccResponsable = $ccResponsable;
	}

	public function getCcResponsable(){
		return $ccResponsable;
	}

	//implementacion de los metodos de IDataAcces
	public function getTitle(){
		return "articulos";
	}

	public function getData()
	{
		$columName = array("idarticulo", "nombre", "activo", "idseccion", "idslinea", "idmarca", "tipo", "referencia", "id_envio", "unidad", "capitalizado_el_af", "amo_acum_af", "val_cont_af", "numero_serie_af", "plaqueta_af", "plaqueta_anterior1_af", "activo_fijo_af", "supranumero_af", "plaqueta_anterior2_af", "cc_responsable_af");

		$values = array($this->idArticulo, $this->nombre, $this->activo, $this->idSeccion, $this->idSublinea, $this->idMarca, $this->tipo, $this->referencia, $this->idEnvio, $this->unidad, $this->capitalizado, $this->amorAcumulada, $this->valContable, $this->numSerie, $this->plaqueta, $this->plaquetaAnt1, $this->activoFijo, $this->supranumero_af, $this->plaquetaAnt2, $this->ccResponsable);
    	return array($columName, $values);
	}

	public function setData($arrayData)
	{
		$this->idArticulo = Tools::validate($arrayData['idarticulo']);
		$this->nombre = Tools::validate($arrayData['nombre']);
		$this->tipo = Tools::validate($arrayData['tipo']);
		$this->referencia = Tools::validate($arrayData['referencia']);
		$this->unidad = Tools::validate($arrayData['unidad']);
		$this->activo = Tools::validate($arrayData['activo']);
		$this->idMarca = Tools::validate($arrayData['idmarca']);
		$this->idSeccion = Tools::validate($arrayData['idseccion']);
		$this->idSublinea = Tools::validate($arrayData['idslinea']);
		$this->idEnvio = Tools::validate($arrayData['id_envio']);
		$this->activoFijo = Tools::validate($arrayData['activo_fijo_af']);
		$this->capitalizado = Tools::validate($arrayData['capitalizado_el_af']);
		$this->amorAcumulada = Tools::validate($arrayData['amo_acum_af']);
		$this->valContable = Tools::validate($arrayData['val_cont_af']);
		$this->numSerie = Tools::validate($arrayData['numero_serie_af']);
		$this->plaqueta = Tools::validate($arrayData['plaqueta_af']);
		$this->plaquetaAnt1 = Tools::validate($arrayData['plaqueta_anterior1_af']);
		$this->plaquetaAnt2 = Tools::validate($arrayData['plaqueta_anterior2_af']);
		$this->supranumero = Tools::validate($arrayData['supranumero_af']);
		$this->ccResponsable = Tools::validate($arrayData['cc_responsable_af']);
		
	}
}
    
?>