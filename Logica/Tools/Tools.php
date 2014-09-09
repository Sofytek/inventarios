<?php

class Tools {
    /**
     * Valida que la referencia a un array exista
     * @return retorna el $value si existe la instancia
     */
    public static function validate(&$value) {
        if (isset($value)) {
            return $value;
        } else {
            return "";
        }
    }
    
    /**
     * genera una excepcion segun
     * @param $massage mensaje de la excepcion
     * @param $value determina si se deve o no lamzar la excepcion 
     */
    public static function thisException($massage, $value = false)
    {
        if($bool){
            throw new Exception($massage);
        }
    }
}
?>