<?php
require_once realpath(dirname(__FILE__) . "/../config/constants.php");

class Controller {
    public function session()
    {
        if(isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }
    }
}