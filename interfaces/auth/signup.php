<?php
session_start();
require_once "../../business/controllers/RegisterController.php";

$signup = new RegisterController();

if($signup->session()) {
  header('Location: ../dashboard/index.php');
}

if(isset($_POST['submit'])) {
    $signup->signup();
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

    <title>Signup Page</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-5">        
        <div
          class="
            bg-white
            shadow-lg
            border-0
            rounded
            border-light
            p-4 p-lg-5
            w-100
            fmxw-500
          "
        >
        <h4 class="text-center">Create New Account</h4>
          <div class="mt-3">
            <?php Flasher::flash() ?>
          </div>
          <form action="" method="post" class="mt-4">
          <div class="form-group mb-4">
              <label for="username">Username</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-user"></i>
                </span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Username"
                  name="username"
                  value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>"
                />
              </div>
              <?php if(isset($_SESSION['error']['username'])) : ?>
                <div class="alert alert-danger mt-2">
                  <?= $_SESSION['error']['username'] ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="form-group mb-4">
              <label for="email">Email</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fa-solid fa-envelope"></i>
                </span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Email"
                  name="email"
                  value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"
                />
              </div>
              <?php if(isset($_SESSION['error']['email'])) : ?>
                <div class="alert alert-danger mt-2">
                  <?= $_SESSION['error']['email'] ?>
                </div>
              <?php endif; ?>
            </div>

              <div class="form-group mb-4">
                <label for="password">Password</label>
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon2">
                    <i class="fa fa-lock"></i>
                  </span>
                  <input
                    type="password"
                    placeholder="Password"
                    class="form-control"
                    name="password"
                    value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>"
                  />
                </div>
                <?php if(isset($_SESSION['error']['password'])) : ?>
                <div class="alert alert-danger mt-2">
                  <?= $_SESSION['error']['password'] ?>
                </div>
              <?php endif; ?>
              </div>

              <div class="form-group mb-4">
                <label for="confirm_password">Confirm Password</label>
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon2">
                    <i class="fa fa-lock"></i>
                  </span>
                  <input
                    type="password"
                    placeholder="Confirm password"
                    class="form-control"
                    name="confirm_password"
                  />
                </div>
              </div>

            <div class="form-group">
              <div class="form-group">
                <label for="confirm_password">Select Role</label>
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon2">
                  <i class="fa-solid fa-user-shield"></i>
                  </span>
                  <select                    
                    class="form-select"
                    name="level"
                  >
                  <option value="staff"
                    <?php if(isset($_POST['level'])) : ?>
                      <?= $_POST['level'] == 'staff' ? 'selected' : '' ?>
                    <?php endif; ?>
                  >Staff</option>
                  <option value="alumni" 
                    <?php if(isset($_POST['level'])) : ?>
                      <?= $_POST['level'] == 'alumni' ? 'selected' : '' ?>
                    <?php endif; ?>
                   >Alumni</option>
                  <option value="visitor"
                    <?php if(isset($_POST['level'])) : ?>
                      <?= $_POST['level'] == 'visitor' ? 'selected' : '' ?>
                    <?php endif; ?>
                  >Visitor</option>
                  <option value="student"
                    <?php if(isset($_POST['level'])) : ?>
                      <?= $_POST['level'] == 'student' ? 'selected' : '' ?>
                    <?php endif; ?>
                  >Student</option>
                </select>
                </div>
              </div>
            </div>

            <div class="mt-2 mb-4">
              <span style="font-size: 14px;">Already have an account? <a href="login.php" class="text-underline"><u>Login now!</u></a></span>
            </div>

            <div class="d-grid">
              <button type="submit" name="submit" class="btn btn-info">Sign Up</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/volt.js"></script>
</body>
</html>