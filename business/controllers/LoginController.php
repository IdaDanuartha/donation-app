<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../models/User.php');

class LoginController {
    private $user;

    public function __construct()
    {
        $this->user = new User();    
    }

    public function login()
    {
        if($this->user->findUserByEmail($_POST['email'])) {
            $loginUser = $this->user->login($_POST);
            if($loginUser) {
                header('Location: ../admin/dashboard.php');
            } else {
                // Flasher::setFlash("Email or Password incorrect", "danger");
                header('Location: login.php');
            }
        } else {
            // Flasher::setFlash("Email not found", "danger");
            header('Location: login.php');
        }
    }
}