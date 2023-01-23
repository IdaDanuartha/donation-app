<?php

class ReviewMiddleware {
    public function __construct()
    {
        unset($_SESSION['error']);
    }

    public function reviewRules($subject, $rating, $message) 
    {
        // Validation if subject is empty
        if(!$subject) {
            $_SESSION['error']['subject'] = 'Subject is required';
            return false;
        }
        // Validation if rating is empty
        if(!$rating) {
            $_SESSION['error']['rating'] = 'Rating is required';
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