<?php

class AuthMiddleware {
    public function __construct()
    {
        unset($_SESSION['error']);
    }

    public function registerRules($username, $email, $password, $confirm_password) 
    {
        // Validation if field not not include number
        $username_lowercase = preg_match('@[a-z]@', $username);
        $username_number    = preg_match('@[0-9]@', $username);

        // Validation if username is empty
        if(!$username) {
            $_SESSION['error']['username'] = 'Username is required';
            return false;
        }

        // Validation if username format invalid
        if(!$username_lowercase || !$username_number || strlen($username) < 5) {
            $_SESSION['error']['username'] = 'Username should be at least 5 characters in length, should include at least one lowercase and one number';
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
        
        $pass_uppercase = preg_match('@[A-Z]@', $password);
        $pass_lowercase = preg_match('@[a-z]@', $password);
        $pass_number    = preg_match('@[0-9]@', $password);

        if(!$pass_uppercase || !$pass_lowercase || !$pass_number || strlen($password) < 6) {
            $_SESSION['error']['password'] = 'Password should be at least 6 characters in length, should include at least one upper case letter, one lower case letter and one number';
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