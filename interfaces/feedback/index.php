<?php
session_start();
require_once "../../business/controllers/FeedbackController.php";

$feedback = new FeedbackController();

if(!$feedback->session()) {
  header('Location: ../auth/login.php');
}

if(isset($_GET['keyword'])) {
    $feedback->getFeedbacks();
}

if(isset($_POST['logout'])) {
    $feedback->logout();
}

if(isset($_POST['delete'])) {
    $feedback->destroy();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/volt.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Feedback Page</title>
</head>
<body>
    <!-- Toggle sidebar -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="/">
            <img class="navbar-brand-dark" src=""/> 
            <img class="navbar-brand-light" src=""/>
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Sidebar -->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div
                class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">

                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">

                <li class="nav-item">
                    <span class="mt-2 d-flex justify-content-between">
                        <span>
                            <span>
                                <span class="sidebar-icon">
                                <i class="fa-solid fa-circle-dollar-to-slot me-2 fa-lg"></i>
                            </span>
                            <span class="sidebar-text fw-bold">E-Donation</span>
                            </span>
                        </span>
                    </span>
                </li>

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

                
                <?php if($_SESSION['user_session']['level'] === 'alumni associations') : ?>
                    <li class="nav-item">
                        <a href="../dashboard/index.php" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-speedometer2 icon icon-xs" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                    <path fill-rule="evenodd"
                                        d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                                </svg>
                            </span>
                            <span class="sidebar-text">Dashboard</span>
                        </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="../review/index.php" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <img src="../assets/img/review.svg" width="20" alt="">
                            </span>
                            <span class="sidebar-text">Reviews</span>
                        </span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item active">
                    <a href="../feedback/index.php" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <img src="../assets/img/feedback.svg" width="20" alt="">
                        </span>
                        <span class="sidebar-text">Feedbacks</span>
                    </span>
                    </a>
                </li>   

                <?php if($_SESSION['user_session']['level'] === 'alumni associations') : ?>
                <li class="nav-item">
                    <a href="../user/index.php" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="sidebar-text">Users</span>
                    </span>
                    </a>
                </li>
                <?php endif; ?>
                
                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

                <li class="nav-item">
                    <form action="" method="post">
                        <a href="" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-arrow-right-from-bracket" style="color: #aaa;"></i>
                            </span>
                            <button type="submit" name="logout" class="bg-transparent border-0 text-white sidebar-text">Sign out</button>
                        </span>
                        </a>
                    </form>
                </li>

            </ul>
        </div>
    </nav>

    <main class="content">

        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <h3>Feedback Page</h3>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid mb-5 mt-5">
        <div class="mt-3">
          <?php Flasher::flash() ?>          
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="">
                <a href="create.php" class="btn btn-md btn-primary border-0 shadow w-100 py-3 px-4" type="button"><i
                    class="fa fa-plus-circle"></i>
                Add Feedback</a>
            </div>
            <div class="">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 shadow py-3 px-4" name="keyword" placeholder="Search feedback...">
                        <span class="input-group-text border-0 shadow">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">

                        <div class="table-responsive">
                            <?php if($_SESSION['user_session']['level'] === 'alumni associations') : ?>
                                <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
                                    <thead class="thead-dark">
                                        <tr class="border-0">
                                            <th class="border-0 rounded-start" style="width:5%">No.</th>
                                            <th class="border-0">Username</th>
                                            <th class="border-0">Subject</th>
                                            <th class="border-0 rounded-end" style="width:15%">Action</th>
                                        </tr>
                                    </thead>
                                    <div class="mt-2"></div>
                                    <tbody>                                    
                                        <?php if(count($feedback->getFeedbacks()) > 0) : ?>
                                            <?php foreach($feedback->getFeedbacks() as $index => $feedback) : ?>
                                                <tr>
                                                    <td class="fw-bold text-center"><?= ++$index ?></td>
                                                    <td><?= $feedback['username'] ?></td>
                                                    <td><?= $feedback['subject'] ?></td>
                                                    <td class="">
                                                        <a href="edit.php?id=<?= $feedback['id'] ?>" class="btn btn-sm btn-info border-0 shadow me-2" type="button"><i class="fa fa-pencil-alt"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#deleteFeedbackModal" value="<?= $feedback['id'] ?>" class="btn btn-sm btn-danger border-0 delete-btn"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No data feedback</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
                                    <thead class="thead-dark">
                                        <tr class="border-0">
                                            <th class="border-0 rounded-start" style="width:5%">No.</th>
                                            <th class="border-0">Subject</th>
                                            <th class="border-0 rounded-end" style="width:15%">Action</th>
                                        </tr>
                                    </thead>
                                    <div class="mt-2"></div>
                                    <tbody>                                    
                                        <?php if(count($feedback->getUserFeedbacks()) > 0) : ?>
                                            <?php foreach($feedback->getUserFeedbacks() as $index => $feedback) : ?>
                                                <tr>
                                                    <td class="fw-bold text-center"><?= ++$index ?></td>
                                                    <td><?= $feedback['subject'] ?></td>
                                                    <td class="">
                                                        <a href="edit.php?id=<?= $feedback['id'] ?>" class="btn btn-sm btn-info border-0 shadow me-2" type="button"><i class="fa fa-pencil-alt"></i></a>
                                                        <button data-bs-toggle="modal" data-bs-target="#deleteFeedbackModal" value="<?= $feedback['id'] ?>" class="btn btn-sm btn-danger border-0 delete-btn"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No data feedback</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                        <!-- <Pagination :links="classrooms.links" align="end" /> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    </main>

    <!-- Modal -->
    <div class="modal fade" id="deleteFeedbackModal" tabindex="-1" aria-labelledby="deleteFeedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <h1 class="modal-title fs-5 text-center" id="deleteFeedbackModalLabel">Delete Feedback</h1>
            <div id="delete-box">
                Are you sure you want to delete this feedback? this process cannot be undone.
            </div>
            <form class="d-flex justify-content-center mt-4" action="" method="post">
                <input type="hidden" name="id" id="data_id">
                <button type="button" class="btn btn-primary me-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="../assets/js/volt.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>