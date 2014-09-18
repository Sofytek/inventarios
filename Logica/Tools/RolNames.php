<?php 
/**
 * 
 */
class RolNames {

	private static $ROL_EMPRESA = "Empresa";
	private static $ROL_DEPENDENCIA = "Dependencia";
	private static $ROL_SECCION = "Seccion";
	private static $ROL_LINEA = "Linea";
	private static $ROL_SUBLINEA = "Sublinea";
	private static $ROL_MARCA = "Marca";
	private static $ROL_ESTADO_ARTICULO = "Estado Articulo";
    	private static $ROL_USUAIROS = "Usuarios";

	public static function getName($idRol)
	{             
		switch ($idRol) {
			case 1:
				return self::$ROL_EMPRESA;
				break;
			
			case 2:
				return self::$ROL_DEPENDENCIA;
				break;
			
			case 3:
				return self::$ROL_SECCION;
				break;
			
			case 4:
				return self::$ROL_LINEA;
				break;
			
			case 5:
				return self::$ROL_SUBLINEA;
				break;
			
			case 6:
				return self::$ROL_MARCA;
				break;
			
			case 7:
				return self::$ROL_ESTADO_ARTICULO;
				break;
			
			case 8:
				return self::$ROL_USUAIROS;
				break;
			
			default:
				return $idRol;
				break;
		}
	}
}

 ?>