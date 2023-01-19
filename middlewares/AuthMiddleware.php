<?php

class AuthMiddleware {
    public function rules($name, $email, $password) 
    {
        if(!$name) {
            $_SESSION['name'] = 'Name is required';
        }
        if(!$email) {
            $_SESSION['email'] = 'Email is required';
        }
        if(!$password) {
            $_SESSION['password'] = 'Password is required';
        }
    }
}