<?php

session_start();

include ('../config.php');

if(isset($_SESSION['admin'])){
    header('Location: dashboard.php');
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $msg = mysqli_query($conn, "SELECT * FROM `admins` WHERE `email` = '$email' AND `password` = '$password' ");
    $rtn = mysqli_fetch_array($msg);
    if($rtn > 0){
        $_SESSION['admin'] = $rtn;
        $extra = "dashboard.php";
        $host = $_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        $link = "http://$host$uri/$extra";

        echo "<script>window.location.href='".$link."'</script>";
    }else{

        $extra = "login.php?serror=invalid credentials";
        $host = $_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        $link = "http://$host$uri/$extra";

        echo "<script>window.location.href='".$link."'</script>";

    }
}

?>


<!DOCTYPE html>

<html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tastebite || Admin Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <link href="assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>

<!-- ===== CONTENT ===== -->

    <body class="hold-transition login-page">
    <div class="login-box mb-5">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <a href="../" class="h1"><b>Tastebite</b> Admin</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
        <!-- Error Alert -->
            <?php if( isset($_GET['serror']) ) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?=  $_GET['serror']; ?></strong>
            </div>
            <?php } ?>
        <!-- /.Error Alert -->
            <form action="" method="POST">
                <label for="email" class="form-label">Email:</label>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <label for="password" class="form-label">Password:</label>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
              
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

<!-- ===== /.CONTENT ===== -->

<!-- ===== FOOTER ===== -->

    <footer class="container-fluid footer bg-white p-4 fixed-bottom">
        <strong>Copyright &copy; 2024 <a href="../index.php"> Tastebite</a>.</strong>
        <br/>All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Admin</b> Dashboard
        </div>
    </footer>

<!-- ===== /.FOOTER ===== -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

</html>