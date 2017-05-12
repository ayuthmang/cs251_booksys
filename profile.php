<?php
// session_save_path("/tmp");
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();

if (empty($_SESSION['fname'])) {
    header("location:login-form.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password | Angle HTML</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicons/favicon.ico" />
    <link rel="icon" type="image/png" href="assets/images/favicons/favicon.png" />
    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicons/apple-touch-icon-114x114-precomposed.png">
    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicons/apple-touch-icon-72x72-precomposed.png">
    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicons/apple-touch-icon-60x60-precomposed.png">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <link rel="stylesheet" href="assets/css/color-defaults.min.css">
    <link rel="stylesheet" href="assets/css/swatch-beige-black.min.css">
    <link rel="stylesheet" href="assets/css/swatch-black-beige.min.css">
    <link rel="stylesheet" href="assets/css/swatch-black-white.min.css">
    <link rel="stylesheet" href="assets/css/swatch-black-yellow.min.css">
    <link rel="stylesheet" href="assets/css/swatch-blue-white.min.css">
    <link rel="stylesheet" href="assets/css/swatch-green-white.min.css">
    <link rel="stylesheet" href="assets/css/swatch-red-white.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-black.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-blue.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-green.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-red.min.css">
    <link rel="stylesheet" href="assets/css/swatch-yellow-black.min.css">
    <link rel="stylesheet" href="assets/css/fonts.min.css" media="screen">
</head>
<body>
<header id="masthead" class="navbar navbar-sticky swatch-black-yellow" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">
                <img src="assets/images/logo.png" alt="One of the best themes ever">Change Password | Booking System
            </a>
        </div>
        <nav class="collapse navbar-collapse main-navbar" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown active"><a href =# class="dropdown-toggle"
                                               data-toggle = "dropdown">Home</a>
                </li>
                <li>
                    <?php
                    //                        print_r ($_SESSION);
                    if(isset($_SESSION['sid']) && $_SESSION['sid'] != ''){
                        echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown"> 
									Student '.$_SESSION['fname'].'</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="profile.php">Profile</a>';
                        echo '</li>';
                        if(isset($_SESSION['C_TYPE']) && $_SESSION["C_TYPE"]==1){
                            echo '<li><a href="admin-panel.php">Control Panel</a>';
                            echo '</li>';
                        }
                        echo '<li><a href="logout.php">Logout</a>';
                        echo '</li>';


                        echo '</ul>';
                    } elseif(isset($_SESSION['uid']) && $_SESSION['uid'] != ''){
                        echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown"> 
									Administrator '.$_SESSION['fname'].'</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li class="dropdown active"><a href="profile.php">Profile</a>';
                        echo '</li>';
                        echo '<li><a href="admin-panel.php">Control Panel</a>';
                        echo '</li>';
                        echo '<li><a href="logout.php">Logout</a>';
                        echo '</li>';
                        echo '</ul>';
                    }else{
                        echo '<li class="">';
                        echo'<a href =login-form.html >Login</a>';
                        echo '</li>';
                        echo '<li class="">';
                        echo'<a href =register-form.html>Register</a>';
                        echo '</li>';

                    }

                    ?>
                </li>
            </ul>

        </nav>
    </div>
</header>

<div id="content" role="main">
    <section class="section swatch-black-yellow">
        <div class="container" align="center">
            <form action="profile-edit.php" method="post">
                <div class="row text-center">
                    <div class="col-md-6 col-md-offset-3">
                        <form class="contact-form" id="contactForm">

                            <header class="section-header underline text-center os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".1s">
                                <h1 class="headline super lead">
                                    Change Password
                                </h1>
                            </header>

                            <!--name used for post , get-->
                            <div class="form-group form-icon-group os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".0s" style="animation-delay: 0.0s">
                                <input name="oldPass" class="form-control" required="" type="password" placeholder="Old Password">
                                <i class="fa fa-key"></i>
                            </div>

                            <div class="form-group form-icon-group os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".3s" style="animation-delay: 0.3s">
                                <input name="newPass" id="newPass" class="form-control" required="" type="password" placeholder="New Password">
                                <i class="fa fa-key"></i>
                            </div>

                            <div class="form-group form-icon-group os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".6s" style="animation-delay: 0.6s">
                                <input name="newPassConfirm" id="confirmNewPass" class="form-control" required="" type="password" placeholder="Confirm New Password">
                                <i class="fa fa-key"></i>
                            </div>


                            <div class="form-group text-center animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".9s" style="animation-delay: 0.9s">
                                <button class="btn btn-primary btn-icon btn-icon-right type="Submit">
                                Change Password
                                <div class="hex-alt">
                                    <i class="fa fa-terminal"></i>
                                </div>
                                </button>
                            </div>


                        </form>
                        <div id="messages"></div>
                    </div>
                </div>

            </form>
        </div>
    </section>


    <footer id="footer" role="contentinfo">
        <section class="section swatch-black-yellow has-top">
            <div class="decor-top">
                <svg class="decor" height="100%" preserveaspectratio="none" version="1.1" viewbox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0 L50 100 L100 0 L100 100 L0 100" stroke-width="0"></path>
                </svg>
            </div>

        </section>
    </footer>
</div>
<a class="go-top hex-alt" href="javascript:void(0)">
    <i class="fa fa-angle-up"></i>

</a>
<script src="assets/js/packages.min.js"></script>
<script src="assets/js/theme.min.js"></script>
</body>
</html>
