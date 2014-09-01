<?php
  /*
   * Interface IDataAccess debe ser implementada por las clases pertenecientes 
   * al modelo para ser utilizadas con IdataAccess
   * @author: Grupo CoopensigU
   * @version: 0.0      
   */  
	interface IDataAccess
	{
   /*
    * Obtiene el título de la tabla a la cual pertenece la clase del modelo para
    * ser llamado en DataAccess         
    * @return título de la tabla 
    */    
		public function getTitle();
    
    /*
    * Obtiene los datos del registro, este va  a ser utilizado por DataAccess y 
    * deben ir en el mismo orden que se encuentran en la tabla de la base de datos         
    * @return título de la tabla 
    */    
		public function getData();

    /*
    * Carga la clase que lo implementa con la informacíon del array 
    * @param $arrayData contiene los datos de la consulta 
    */
    public function setData($arrayData);
	}
?>