<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../../middlewares/AuthMiddleware.php');
require_once realpath(dirname(__FILE__) . '/../core/Flasher.php');
require_once realpath(dirname(__FILE__) . '/../models/User.php');

class LoginController extends Controller {
    private $auth;
    private $user;

    public function __construct()
    {
        $this->user = new User();
        $this->auth = new AuthMiddleware();
    }

    public function login()
    {
        $rules = $this->auth->loginRules($_POST['email'], $_POST['password']);

        if($rules) {
            if($this->user->findUserByEmail($_POST['email'])) {
                $loginUser = $this->user->login($_POST);
                if($loginUser) {
                    header('Location: ../dashboard/index.php');
                } else {
                    Flasher::setFlash("Login failed! Email or password incorrect", "danger");
                }
            } else {
                Flasher::setFlash("Login failed! Email not found", "danger");
            }
        }
    }
}