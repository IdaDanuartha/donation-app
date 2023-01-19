<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../../middlewares/AuthMiddleware.php');
require_once realpath(dirname(__FILE__) . '/../core/Flasher.php');
require_once realpath(dirname(__FILE__) . '/../models/User.php');
class RegisterController extends Controller {
    private $auth;
    private $user;

    public function __construct()
    {
        $this->user = new User();
        $this->auth = new AuthMiddleware();
    }

    public function signup()
    {
        $rules = $this->auth->registerRules($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password']);

        if($rules) {
            if($this->user->findUserByEmail($_POST['email'])) {
                Flasher::setFlash("Email already exist", "danger");
            } else {
                if($this->user->createUser($_POST) > 0) {
                    // Flasher::setFlash("Account created successfully", "success");
                    header('Location: login.php');
                } else {            
                    Flasher::setFlash("Account created failed", "danger");
                }
            }
        }
    }
}