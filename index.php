<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(E_ERROR | E_PARSE);
// session_save_path("/tmp");
ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Booking System</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicons/favicon.ico"/>
    <link rel="icon" type="image/png" href="assets/images/favicons/favicon.png"/>
    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="assets/images/favicons/apple-touch-icon-114x114-precomposed.png">
    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="assets/images/favicons/apple-touch-icon-72x72-precomposed.png">
    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicons/apple-touch-icon-60x60-precomposed.png">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <link rel="stylesheet" href="assets/css/color-defaults.min.css">
    <link rel="stylesheet" href="assets/css/swatch-beige-black.min.css">
    <link rel="stylesheet" href="assets/css/swatch-black-beige.min.css">
    <link rel="stylesheet" href="assets/css/swatch-black-white.min.css">
    <link rel="stylesheet" href="assets/css/swatch-black-yellow.min.css">
    <link rel="stylesheet" href="assets/css/swatch-blue-white.min.css">
    <link rel="stylesheet" href="assets/css/swatch-green-white.min.css">
    <link rel="stylesheet" href="assets/css/swatch-black-beige.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-black.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-blue.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-green.min.css">
    <link rel="stylesheet" href="assets/css/swatch-black-beige.min.css">
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
            <a href="./index.php" class="navbar-brand">
                <img src="assets/images/logo.png" alt="">Home | Booking System
            </a>
        </div>
        <nav class="collapse navbar-collapse main-navbar" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown active">
                    <a href=# class="dropdown-toggle" data-toggle="dropdown">Home</a>

                    <ul class='dropdown-menu'>
                        <li>
                            <a href="booking-form.php">Booking Form</a>
                        </li>

                        <li>
                            <a href="confirm-form.php">Confirm Form</a>
                        </li>
                    </ul>
                </li>



                <li>
                    <?php

                    if (isset($_SESSION['sid']) && $_SESSION['sid'] != '') {

                        # for print admin toggle drop down
                        echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown">
									Student ' . $_SESSION['fname'] . '</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="profile-form.php">Profile</a>';
                        echo '</li>';
                        if (isset($_SESSION['C_TYPE']) && $_SESSION["C_TYPE"] == 1) {
                            echo '<li><a href="admin-panel.php">Control Panel</a>';
                            echo '</li>';
                        }
                        echo '<li><a href="logout.php">Logout</a>';
                        echo '</li>';

                        echo '</ul>';


                    } elseif (isset($_SESSION['uid']) && $_SESSION['uid'] != '') {


                        echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown">
									Administrator ' . $_SESSION['fname'] . '</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="profile-form.php">Profile</a>';
                        echo '</li>';
                        echo '<li><a href="admin-panel.php">Control Panel</a>';
                        echo '</li>';
                        echo '<li><a href="logout.php">Logout</a>';
                        echo '</li>';
                        echo '</ul>';


                    } else {

                        echo '<li class="">';
                        echo '<a href =login-form.php >Login</a>';
                        echo '</li>';
                        echo '<li class="">';
                        echo '<a href =register-form.php>Register</a>';
                        echo '</li>';

                    }
                    echo '<li class="">';
                    echo '<a href ="help.php" >Help</a>';
                    echo '</li>';
                    ?>
                </li>
            </ul>

        </nav>
    </div>
</header>
<div id="content" role="main">
    <div class="decor-top">
        <svg xmlns="http://www.w3.org/2000/svg" class="decor hidden-xs hidden-sm" viewBox="0 0 100 100"
             preserveAspectRatio="none meet" width="100%" height="100%" version="1.1">
            <path stroke-width="0"
                  d="M 0 100 L 0 50 L 2 50 L 2 100 L 4 100 L 4 50 L 6 50 L 6 100 L 8 100 L 8 50 L 10 50 L 10 100 L 12 100 L 12 50 L 14 50 L 14 100 L 16 100 L 16 50 L 18 50 L 18 100 L 20 100 L 20 50 L 22 50 L 22 100 L 24 100 L 24 50 L 26 50 L 26 100 L 28 100 L 28 50 L 30 50 L 30 100 L 32 100 L 32 50 L 34 50 L 34 100 L 36 100 L 36 50 L 38 50 L 38 100 L 40 100 L 40 50 L 42 50 L 42 100 L 44 100 L 44 50 L 46 50 L 46 100 L 48 100 L 48 50 L 50 50 L 50 100 L 52 100 L 52 50 L 54 50 L 54 100 L 56 100 L 56 50 L 58 50 L 58 100 L 60 100 L 60 50 L 62 50 L 62 100 L 64 100 L 64 50 L 66 50 L 66 100 L 68 100 L 68 50 L 70 50 L 70 100 L 72 100 L 72 50 L 74 50 L 74 100 L 76 100 L 76 50 L 78 50 L 78 100 L 80 100 L 80 50 L 82 50 L 82 100 L 84 100 L 84 50 L 86 50 L 86 100 L 88 100 L 88 50 L 90 50 L 90 100 L 92 100 L 92 50 L 94 50 L 94 100 L 96 100 L 96 50 L 98 50 L 98 100 L 100 100"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="decor visible-xs visible-sm" viewBox="0 0 100 100"
             preserveAspectRatio="none meet" width="100%" height="100%" version="1.1">
            <path stroke-width="0"
                  d="M 0 100 L 0 50 L 5 50 L 5 100 L 10 100 L 10 50 L 15 50 L 15 100 L 20 100 L 20 50 L 25 50 L 25 100 L 30 100 L 30 50 L 35 50 L 35 100 L 40 100 L 40 50 L 45 50 L 45 100 L 50 100 L 50 50 L 55 50 L 55 100 L 60 100 L 60 50 L 65 50 L 65 100 L 70 100 L 70 50 L 75 50 L 75 100 L 80 100 L 80 50 L 85 50 L 85 100 L 90 100 L 90 50 L 95 50 L 95 100 L 100 100"/>
        </svg>
    </div>


    <section class="section swatch-black-yellow">
        <div class="container">

            <b>
                <?php
                // print hello name
                // e.g. Somsri, Hello
                if (isset($_SESSION['fname']) && $_SESSION['fname'] != '') {


                    echo '<header class="section-header underline os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".2s" style="animation-delay: 2s;">';
                    echo '<h1 class="headline super hyper hairline ">';
                    echo ' ' . $_SESSION['fname'] . ',  Hello.';

                    echo "</h1>";
                    echo '</header>';
                } else {

                    echo '<header class="section-header underline text-center os-animation animated fadeInDown" data-os-animation="fadeInDown" data-os-animation-delay=".0s" style="animation-delay: 0s;">';
                    echo '<h1 class="headline super hairline bordered-header">';
                    echo 'Welcome to Booking System';
                    echo "</h1>";
                    echo '</header>';
                }
                ?>
            </b>



            <div class="text-center">

                <a class="btn btn-primary btn-lg btn-icon-right pull-center os-animation animated fadeInLeft" data-os-animation="fadeInDown" data-os-animation-delay=".6s" style="animation-delay: 6s;" href="booking-form.php">
                    BOOKING NOW
                    <div class="hex-alt hex-alt-big">
                        <i class="fa fa-desktop" data-animation="bounce"></i>
                    </div>
                </a>


                <a class="btn btn-success btn-lg btn-icon-right pull-center os-animation animated fadeInRight" data-os-animation="fadeInDown" data-os-animation-delay=".9s" style="animation-delay: 9s;" href="confirm-form.php">
                    CONFIRM BOOKING
                    <div class="hex-alt hex-alt-big">
                        <i class="fa fa-check-circle" data-animation="tada"></i>
                    </div>
                </a>


                <a class="btn btn-info btn-lg btn-icon-right pull-center os-animation animated fadeInRight" data-os-animation="fadeInDown" data-os-animation-delay="1.2s" style="animation-delay: 1.2s;" href="help.php">
                    NEED HELP?
                    <div class="hex-alt hex-alt-big">
                        <i class="fa fa-book" data-animation="tada"></i>
                    </div>
                </a>
            </div>

        </div>



    </section>





    <footer id="footer" role="contentinfo">
        <section class="section swatch-black-beige has-top">
            <div class="decor-top">
                <svg class="decor" height="100%" preserveaspectratio="none" version="1.1" viewbox="0 0 100 100"
                     width="100%" xmlns="http://www.w3.org/2000/svg">
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
