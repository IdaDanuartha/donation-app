<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../models/User.php');
require_once realpath(dirname(__FILE__) . '/../models/Review.php');
require_once realpath(dirname(__FILE__) . '/../core/Flasher.php');
require_once realpath(dirname(__FILE__) . '/../../middlewares/ReviewMiddleware.php');

class ReviewController extends Controller {
    private $user;
    private $review;
    private $reviewMiddleware;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
        $this->review = new Review();
        $this->reviewMiddleware = new ReviewMiddleware();
    }

    public function logout()
    {
        if($this->user->logout()) {
            header('Location: ../auth/login.php');
        }
    }

    public function getReviews()
    {
        return $this->review->getReviews(isset($_GET['keyword']) ? $_GET['keyword'] : '');
    }

    public function getUserReviews()
    {
        return $this->review->getUserReviews(isset($_GET['keyword']) ? $_GET['keyword'] : '');
    }

    public function getReview($id)
    {
        return $this->review->getReview($id);
    }

    public function store()
    {
        $rules = $this->reviewMiddleware->reviewRules($_POST['subject'], $_POST['rating'], $_POST['message']);

        if($rules) {
            if($this->review->store($_POST) > 0) {
                Flasher::setFlash("Review created successfully", "success");
                header('Location: index.php');            
            } else {
                Flasher::setFlash("Review created failed", "danger");
            }
        }
    }

    public function update($id)
    {
        $rules = $this->reviewMiddleware->reviewRules($_POST['subject'], $_POST['rating'], $_POST['message']);

        if($rules) {
            if($this->review->update($_POST, $id) > 0) {
                Flasher::setFlash("Review updated successfully", "success");            
                header('Location: index.php');     
            } else {
                Flasher::setFlash("Review updated failed", "danger");
            }
        }
    }

    public function destroy()
    {
        if($this->review->destroy($_POST['id']) > 0) {
            Flasher::setFlash("Review deleted successfully", "success");            
        } else {
            Flasher::setFlash("Review deleted failed", "danger");
        }
    }
}