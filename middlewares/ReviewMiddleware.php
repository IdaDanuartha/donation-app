<?php

class ReviewMiddleware {
    public function __construct()
    {
        unset($_SESSION['error']);
    }

    public function reviewRules($name, $subject, $message) 
    {
        // Validation if name is empty
        if(!$name) {
            $_SESSION['error']['name'] = 'Name is required';
            return false;
        }
        // Validation if subject is empty
        if(!$subject) {
            $_SESSION['error']['subject'] = 'Subject is required';
            return false;
        }
        // Validation if message is empty
        if(!$message) {
            $_SESSION['error']['message'] = 'Message is required';
            return false;
        }

        return true;
    }
}