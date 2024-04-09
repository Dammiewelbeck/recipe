<?php

include('../default.php');

if(isset($_SESSION['chef'])){
    header("Location: dashboard.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
            
    if( $name == null || $email == null || $password == null ){
        $link = $loader->getLink('register.php');
        echo "<script>alert('All Fields Required'); window.location.href='".$link."'</script>";
        exit();
    }
    
    if( $loader->doesEmailExist($email)){
        $link = $loader->getLink('register.php');
        echo "<script>alert('Email Already Exist'); window.location.href='".$link."'</script>";
        exit();
    }
    
    $register_user = mysqli_query($con, "INSERT INTO `chefs`(`name`, `email`, `password`) VALUES ('$name','$email','$password')");

   
    if($register_user){
        
        $msg = mysqli_query($con, "SELECT * FROM `chefs` WHERE `email` = '$email'");
        $rtn = mysqli_fetch_array($msg);

       $link = $loader->getLink('dashboard.php');
        $_SESSION['chef'] = $rtn;
        echo "<script>alert('Regristration Successful'); window.location.href='".$link."'</script>";
    }else{
       $link =  $loader->getLink('register.php');
        echo "<script>alert('Something went wrong, please try again'); window.location.href='".$link."'</script>";
    }
    
}

?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.ico">
    <title> Chef Register || Tastebite</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
   
</head>


<body>
    <div class="main-wrapper">

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
    
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row text-center">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../assets/images/menus/menu1.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <img src="../assets/images/brands/brand4.svg" alt="wrapkit">
                        <h2 class="mt-3 text-center">Sign Up for Free</h2>
                        <form class="mt-4" method="post" action="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" name="name" required placeholder="your name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="email" name="email" required placeholder="email address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="password" name="password" required placeholder="password">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark">Sign Up</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Already have an account? <a href="login.php" class="text-danger">Sign In</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>