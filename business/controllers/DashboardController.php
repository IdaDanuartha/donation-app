<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../models/User.php');
require_once realpath(dirname(__FILE__) . '/../models/User.php');

class DashboardController extends Controller {
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getUserLogin()
    {
        var_dump($this->user->findUserById());
    }
    
    public function logout()
    {
        if($this->user->logout()) {
            header('Location: ../auth/login.php');
        }
    }
}