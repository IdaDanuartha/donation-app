<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../models/User.php');

class RegisterController extends Controller {
    public function signup()
    {
        if($this->user->findUserByEmail($_POST['email'])) {
            // Flasher::setFlash("Email already exist", "danger");
            header('Location: signup.php');
        } else {
            if($this->user->createUser($_POST) > 0) {
                // Flasher::setFlash("Account created successfully", "success");
                header('Location: login.php');
            } else {            
                // Flasher::setFlash("signup failed", "danger");
                header('Location: signup.php');
            }
        }
    }
}