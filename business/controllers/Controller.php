<?php
require_once realpath(dirname(__FILE__) . "/../config/constants.php");
require_once realpath(dirname(__FILE__) . '/../models/User.php');

class Controller {
    protected $user;

    public function __construct()
    {
        $this->user = new User();    
    }

    public function session()
    {
        if(isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }
    }
}