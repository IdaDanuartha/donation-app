<?php

class AuthMiddleware {
    public function __construct()
    {
        unset($_SESSION['error']);
    }

    public function registerRules($name, $email, $password, $confirm_password) 
    {
        // Validation if name is empty
        if(!$name) {
            $_SESSION['error']['name'] = 'Name is required';
            return false;
        }
        // Validation if email is empty
        if(!$email) {
            $_SESSION['error']['email'] = 'Email is required';
            return false;
        }
        // Validation if format email invalid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error']['email'] = 'Invalid email format';
            return false;
        }
        // Validation if password is empty
        if(!$password) {
            $_SESSION['error']['password'] = 'Password is required';
            return false;
        }   
        
        
        // Validation if password length less than 6, not include one uppercase, not include number
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);   

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
            $_SESSION['error']['password'] = 'Password should be at least 6 characters in length, should include at least one upper case letter, and one number';
            return false;
        }

        // Validation if password and confirm password not match
        if($password !== $confirm_password) {
            $_SESSION['error']['password'] = 'Password and confirm password not match';
            return false;
        }

        return true;
    }

    public function loginRules($email, $password) 
    {
        // Validation if email is empty
        if(!$email) {
            $_SESSION['error']['email'] = 'Email is required';
            return false;
        }
        // Validation if format email invalid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error']['email'] = 'Invalid email format';
            return false;
        }
        // Validation if password is empty
        if(!$password) {
            $_SESSION['error']['password'] = 'Password is required';
            return false;
        }   

        return true;
    }
}