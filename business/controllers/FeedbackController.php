<?php
require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../models/User.php');
require_once realpath(dirname(__FILE__) . '/../models/Feedback.php');
require_once realpath(dirname(__FILE__) . '/../core/Flasher.php');
require_once realpath(dirname(__FILE__) . '/../../middlewares/FeedbackMiddleware.php');

class FeedbackController extends Controller {
    private $user;
    private $feedback;
    private $feedbackMiddleware;

    public function __construct()
    {        
        $this->user = new User();
        $this->feedback = new Feedback();
        $this->feedbackMiddleware = new FeedbackMiddleware();
    }

    public function logout()
    {
        if($this->user->logout()) {
            header('Location: ../auth/login.php');
        }
    }

    public function getFeedbacks()
    {
        return $this->feedback->getFeedbacks(isset($_GET['keyword']) ? $_GET['keyword'] : '');
    }

    public function getFeedback($id)
    {
        return $this->feedback->getFeedback($id);
    }

    public function getUserFeedbacks()
    {
        return $this->feedback->getUserFeedbacks(isset($_GET['keyword']) ? $_GET['keyword'] : '');
    }

    public function store()
    {
        $rules = $this->feedbackMiddleware->feedbackRules($_POST['subject'], $_POST['critics'], $_POST['suggestion']);

        if($rules) {
            if($this->feedback->store($_POST) > 0) {
                Flasher::setFlash("Feedback created successfully", "success");
                header('Location: index.php');            
            } else {
                Flasher::setFlash("Feedback created failed", "danger");
            }
        }
    }

    public function update($id)
    {
        $rules = $this->feedbackMiddleware->feedbackRules($_POST['subject'], $_POST['critics'], $_POST['suggestion']);

        if($rules) {
            if($this->feedback->update($_POST, $id) > 0) {
                Flasher::setFlash("Feedback updated successfully", "success");            
                header('Location: index.php');     
            } else {
                Flasher::setFlash("Feedback updated failed", "danger");
            }
        }
    }

    public function destroy()
    {
        if($this->feedback->destroy($_POST['id']) > 0) {
            Flasher::setFlash("Feedback deleted successfully", "success");            
        } else {
            Flasher::setFlash("Feedback deleted failed", "danger");
        }
    }
}