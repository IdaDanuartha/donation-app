<?php

class FeedbackMiddleware {
    public function __construct()
    {
        unset($_SESSION['error']);
    }

    public function feedbackRules($subject, $critics, $suggestion) 
    {
        // Validation if subject is empty
        if(!$subject) {
            $_SESSION['error']['subject'] = 'Subject is required';
            return false;
        }
        // Validation if critics is empty
        if(!$critics) {
            $_SESSION['error']['critics'] = 'Critics is required';
            return false;
        }
        // Validation if suggestion is empty
        if(!$suggestion) {
            $_SESSION['error']['suggestion'] = 'Suggestion is required';
            return false;
        }

        return true;
    }
}