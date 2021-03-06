<?php
  session_start();
  if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    require 'dbowner/db.php';
    $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    while ($data = mysqli_fetch_assoc($result)) {
      $id = $data['id'];
      $type = $data['type'];
      $status = $data['status'];
    }

    if ($rows > 0) {
      if ($type == 'user') {
        if ($status == 'active') {
          $_SESSION['id'] = $id;
          echo "<script>alert('Logged in as user');window.location='user/userdashboard.php'</script>";
        }
        else{
          echo "<script>alert('User inactive');window.location='login.php'</script>";
        }
      }
      else if ($type == 'owner') {
        if ($status == 'active') {
          $_SESSION['id'] = $id;
          echo "<script>alert('Logged in as owner');window.location='owner/ownerdashboard.php'</script>";
        }
        else{
          echo "<script>alert('User inactive');window.location='login.php'</script>";
        }
      }
      else if ($type == 'admin') {
        if ($status == 'active') {
          $_SESSION['id'] = $id;
          echo "<script>alert('Logged in as admin');window.location='admin/admindashboard.php'</script>";
        }
        else{
          mysqli_error();
        }
      }
    }
    else{
       echo "<script>alert('Incorrect Credentials')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAG</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="login.php"><img src="assets/images/logo-03.png" alt="" width="40"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="register.php">Register</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<body>
    <main>
        <div class="container col-lg-5 bg-light px-5 py-5">
        <div class="container text-center">
          <img src="assets/images/logo.png" alt="" width="150">
        </div>
        	<form class="form-horizonta py-5" method="POST" action="">
        		<div class="form-group">
        			<label>Email</label>
        			<input class="form-control" type="email" name="email" placeholder="Enter Email" required>
        		</div>
        		<div class="form-group">
        			<label>Password</label>
        			<input class="form-control" type="password" name="password" placeholder="Enter Password" required>
        		</div>
        		<div class="form-group">
        			<button class="btn btn-primary btn-block" name="btnLogin">Login</button>
        		</div>
        	</form>
        </div>
    </main>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.js.map"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js.map"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js.map"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js.map"></script>
</body>
</html>