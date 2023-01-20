<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../models/User.php');
require_once realpath(dirname(__FILE__) . '/../models/Review.php');
require_once realpath(dirname(__FILE__) . '/../models/Feedback.php');

class DashboardController extends Controller {
    private $user;
    private $review;
    private $feedback;

    public function __construct()
    {
        $this->user = new User();
        $this->review = new Review();
        $this->feedback = new Feedback();
    }

    public function getReviewCount()
    {
        return count($this->review->getReviews(''));
    }
    
    public function getFeedbackCount()
    {
        return count($this->feedback->getFeedbacks(''));
    }
    
    public function getUserCount()
    {
        return count($this->user->getUsers());
    }
    
    public function logout()
    {
        if($this->user->logout()) {
            header('Location: ../auth/login.php');
        }
    }
}