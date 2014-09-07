<?php
require_once 'IDataAccess.php';
require_once 'Conexion.php';
/*
 * Esta clase se encarga de realizar la interacci�n del modelo con la base de
 * datos, mediante la interface IdataAcces.
 * @author: Grupo CoopensigUD
 * @version: 0.0
 */
Class DataAccess {

	private static $CONST_PREFIX = "";
	private static $dbcon;
	
	public static function setConexion(Conexion $conexion)
	{
		self::$dbcon = $conexion->getConexion();
	} 
	 /*
	 * Inserta un registro en la base de datos.
	 * @param $dataAccess clase del modelo que implementa IDataAccess
	 * @return t�tulo de la tabla
	 * @exeption
	 */
	public static function write(IDataAccess $dataAccess) {
		$result = null;
		$table = $dataAccess -> getTitle();
		$dataArray = $dataAccess -> getData()[1];
		$dbconexion = self::$dbcon;

		if ($table == null || $dataArray == null) {
			throw new Exception("Nombre de tabla ó datos NULOS :)");
			return;
		}

		$query = "INSERT INTO " . self::$CONST_PREFIX . $table . " VALUES (Default,";
		$count = count($dataArray);

		for ($index = 1; $index < $count; $index++) {
			$query .= "'" . pg_escape_string($dataArray[$index]) . "'";
			if ($index + 1 < $count) {
				$query .= ",";
			} else {
				$query .= ");";
			}
		}
		
		$result = pg_query($dbconexion, $query); // or die("FAllo");

		if (!$result) {
			throw new Exception("Error en la consulta :)");
			return;
		}
		return TRUE;
	}

	public static function read(IDataAccess $dataAccess) {
		$result = null;
		$table = $dataAccess -> getTitle();
		$values = $dataAccess -> getData()[1];
		$columName = $dataAccess -> getData()[0];

		if ($table == null || $values == null || $columName == null) {
			throw new Exception("Nombre de tabla ó datos ó nombres de campos NULOS");
			return;
		}
		$query = "SELECT * FROM " . self::$CONST_PREFIX . $table . " WHERE " . pg_escape_string($columName[0]) . "= '" . pg_escape_string($values[0]) . ";";

		$result = pg_query($query);

		if (!$result) {
			throw new Exception("Error en la consulta :)");
			return;
		}
		elseif ($row = pg_fetch_row($result)) {
			$dataAccess -> setData($row);
		}else{
			return FALSE;
		}
		return TRUE;

	}

	public static function update(IDataAccess $dataAccess) {
		$result = null;
		$table = $dataAccess -> getTitle();
		$values = $dataAccess -> getData()[1];
		$columName = $dataAccess -> getData()[0];

		if ($table == null || $values == null || $columName == null) {
			throw new Exception("Nombre de tabla ó datos ó nombres de campos NULOS");
			return;
		}

		$query = "UPDATE " . self::$CONST_PREFIX . $table . " SET ";
		$count = count($values);

		for ($index = 1; $index < $count; $index++) {
			$query .= pg_escape_string($columName[$index]) . "= '" . pg_escape_string($values[$index]) . "'";
			if ($index + 1 < $count) {
				$query .= ",";
			} else {
				$query .= "WHERE " . pg_escape_string($columName[0]) . "= '" . pg_escape_string($values[0]) . ";";
			}
		}
		$result = pg_query($query);

		if (!$result) {
			throw new Exception("Error en la consulta :)");
			return;
		}
		return TRUE;

	}
	
	public static function selectWhere(IDataAccess $dataAccess, $positionWhile=null)
	{
		$dbconexion = self::$dbcon;
		$table = $dataAccess->getTitle();
		$values = $dataAccess -> getData()[1];
		$columName = $dataAccess -> getData()[0];
		
		$query = "SELECT * FROM ".$table;
		
		/*if($positionWhile != null){
    		$query.= " WHERE " . pg_escape_string($columName[$positionWhile]) . " = '" . pg_escape_string($values[$positionWhile])."'"; 
		}*/
		$query.=";";
		
	
		$result = pg_query($dbconexion, $query);
		
		if (!$result) {
			throw new Exception("Error en la consulta :)");
			return;
		}
		
		while ($row = pg_fetch_assoc($result)) {
			$dataArry[] = $row;
		}
		return $dataArry;
	}

	public static function eliminar(IDataAccess $dataAccess) {
	}

	public static function Login(IDataAccess $dataAccess)
	{
		$dbconexion = self::$dbcon;	
		$result = FALSE;
		$table = $dataAccess -> getTitle();
		$values = $dataAccess -> getData()[1];
		$columName = $dataAccess -> getData()[0];
	
        $name = pg_escape_string($values[3]);
        $password = pg_escape_string($values[5]);
		
		if($name == null && $password == null)
		{
			throw new Exception("Usuario ó Usuario NULOS");
			return FALSE;
		}
		
		$query = "SELECT * FROM " . self::$CONST_PREFIX . $table . " WHERE " . pg_escape_string($columName[3]) . " = '" . pg_escape_string($values[3]) . "' AND ".
			pg_escape_string($columName[5]) . " = '" . pg_escape_string($values[5]) ."' ;";
		
		$result = pg_query($dbconexion, $query);
		
		if ($result == null) 
		{	
			return FALSE;
		}
		
		$row = pg_fetch_assoc($result);
		
		if(!$row['idusuario']) //columna de la contrasenia
		{
			return FALSE;
		}
		
		$dataAccess -> setData($row);
		
		return TRUE;
	}

}
?>