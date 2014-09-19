<?php
class Conexion
{
  private $conexion;
   
  function __construct() {
    $this->conexion = null;
  }
  
	public function conectar() 
	{

		/*
		 * Tener en cuenta que para seguridad no dejar los datos de la conexion 
		 * implicito en el codigo Hacer un metodo que los lea de un archivo y
		 * posteriormente cargue las variables de esta clase (P)
		 */
		$dbname = "ActivosFijos";
		$host = "localhost"; 
		$port = "5432";
		$dbuser = "postgres";
		$password = "root"; //$dbuser = "postgres";
		$this->conexion = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$password")
			or die ('sin conexion!!');

		if(!$this->conexion)
		{
        	echo ("no conecto");
			return;
		}
	}

	public function desconectar()
	{
		pg_close($this->conexion);
	}
	
	function getConexion ()
	{
		return $this->conexion;	
	}	

  	/*function __destruct() {
    	if($this->conexion != null)
    	{
      	pg_close($this->conexion);
      	$this->conexion = null;
    	}          
  	}*/
}	

?>