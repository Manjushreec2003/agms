<?php
session_start();

// ✅ Enable error display for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/dbconnection.php'); // Correct path since includes is outside admin

if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($con, "SELECT ID FROM tbladmin WHERE UserName='$adminuser' AND Password='$password'");
    $ret = mysqli_fetch_array($query);

    if ($ret) {
        $_SESSION['agmsaid'] = $ret['ID'];
        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | Art Gallery Management System</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-img3-body">
  <div class="container">
    <form class="login-form" action="" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>

        <label>
          <span class="pull-right"><a href="forgot-password.php">Forgot Password?</a></span>
        </label>

        <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
        <p style="margin-top:3%; font-weight:bold"><a href="../index.php">Back to Home page</a></p>
      </div>
    </form>
  </div>
</body>
</html>
