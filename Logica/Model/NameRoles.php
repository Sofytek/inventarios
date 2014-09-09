<?php 
/**
 * 
 */
class NameRoles {

	private static final $ROL_EMPRESA = "Empresa";
	private static final $ROL_USUAIROS = "Usuarios";

	public static function getName($idRol)
	{
		switch ($idRol) {
			case 0:
				return self::$ROL_EMPRESA;
				break;
			case 1:
				return self::$ROL_USUAIROS;
				break;
			
			default:
				return null;
				break;
		}
	}
}

 ?>