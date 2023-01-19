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
    <title>Document</title>
</head>
<body>
    <h2>Hello</h2>

    <form action="" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>