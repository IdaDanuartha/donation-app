<?php
session_start();
require_once "../../business/controllers/DashboardController.php";

$dashboard = new DashboardController();

if(!$dashboard->session()) {
  header('Location: ../auth/login.php');
}

if(isset($_POST['logout'])) {
    $dashboard->logout();
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

    <title>Dashboard Page</title>
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
                            <!-- <span class="sidebar-icon">
                                <i class="fa-solid fa-circle-dollar-to-slot me-2 fa-lg"></i>
                            </span> -->
                            <span class="sidebar-text fw-bold">Review & Feedback</span>
                        </span>
                    </span>
                </li>

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

                <li class="nav-item active">
                    <a href="index.php" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-speedometer2 icon icon-xs me-2" viewBox="0 0 16 16">
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
                        <span class="sidebar-text">Review</span>
                    </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../feedback/index.php" class="nav-link d-flex justify-content-between">
                    <span>
                        <span class="sidebar-icon">
                            <img src="../assets/img/feedback.svg" width="20" alt="">
                        </span>
                        <span class="sidebar-text">Feedback</span>
                    </span>
                    </a>
                </li>   
                
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
                        <h3>Dashboard Page</h3>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid mb-5 mt-5">
        <div class="row">

            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-4 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-info rounded me-4 me-sm-0">
                                    <img src="../assets/img/reviewDashboard.svg" width="35" alt="">
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Total Reviews</h2>
                                    <h3 class="fw-extrabold mb-1"><?= $dashboard->getReviewCount() ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h5">Total Reviews</h2>
                                    <h3 class="fw-extrabold mb-1"><?= $dashboard->getReviewCount() ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-4 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-success rounded me-4 me-sm-0">
                                <img src="../assets/img/feedbackDashboard.svg" width="35" alt="">
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Total Feedbacks</h2>
                                    <h3 class="fw-extrabold mb-1"><?= $dashboard->getFeedbackCount() ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h5">Total Feedbacks</h2>
                                    <h3 class="fw-extrabold mb-1"><?= $dashboard->getFeedbackCount() ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-4 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-danger rounded me-4 me-sm-0">
                                    <div><i class="fa-solid fa-users fa-xl"></i></div>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Total Users</h2>
                                    <h3 class="fw-extrabold mb-1"><?= $dashboard->getFeedbackCount() ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h5">Total Users</h2>
                                    <h3 class="fw-extrabold mb-1"><?= $dashboard->getUserCount() ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </main>

    <script src="../assets/js/volt.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>