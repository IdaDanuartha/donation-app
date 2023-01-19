<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../models/User.php');

class DashboardController extends Controller {
    public function logout()
    {
        if($this->user->logout()) {
            header('Location: ../auth/login.php');
        }
    }
}