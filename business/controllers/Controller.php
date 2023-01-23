<?php
require_once realpath(dirname(__FILE__) . "/../config/constants.php");

class Controller {
    public function __construct()
    {
        if($_SESSION['user_session']['level'] !== 'alumni associations') {            
            header('Location: ../feedback/index.php');
        }
    }

    public function session()
    {
        if(isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }
    }
}