<?php
require_once 'SystemControl.php';

/**
 *
 */
class HClog extends SystemControl {

    function __construct(&$session, $name, $password) {
        try {
            parent::login($session, $name, $password);
        } catch(exception $e) {
            throw new Exception($e -> getMessage());
        }
    }

}
?>