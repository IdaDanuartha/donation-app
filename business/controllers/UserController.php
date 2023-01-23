<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../models/User.php');

class UserController extends Controller {
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function getUsers()
    {
        return $this->user->getUsersExceptAdmin(isset($_GET['keyword']) ? $_GET['keyword'] : '');
    }
    
    public function logout()
    {
        if($this->user->logout()) {
            header('Location: ../auth/login.php');
        }
    }
}