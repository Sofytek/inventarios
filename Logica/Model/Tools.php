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

}
?>