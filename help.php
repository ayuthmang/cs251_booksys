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
    <title>Help | Booking System</title>
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
                <li class="dropdown ">
                    <a href=# class="dropdown-toggle" data-toggle="dropdown" >Home</a>

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
                echo '<a href =register-form.html>Register</a>';
                echo '</li>';

                }
                echo '<li class="active">';
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
//                if (isset($_SESSION['fname']) && $_SESSION['fname'] != '') {
//
//
//                    echo '<header class="section-header underline os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".2s" style="animation-delay: 2s;">';
//                echo '<h1 class="headline super hyper hairline ">';
//                echo ' ' . $_SESSION['fname'] . ',  Hello.';
//
//                echo "</h1>";
//                echo '</header>';
//                } else {
//
//                echo '<header class="section-header underline text-center os-animation animated fadeInDown" data-os-animation="fadeInDown" data-os-animation-delay=".0s" style="animation-delay: 0s;">';
//                echo '<h1 class="headline super hairline bordered-header">';
//                    echo 'Welcome to Booking System';
//                    echo "</h1>";
//                echo '</header>';
//                }
                ?>
            </b>


            <!--  -->
            <section class="section swatch-black-yellow has-top ">
                <div class="decor-top">
                    <svg class="decor hidden-xs hidden-sm" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 100 L2 60 L4 100 L6 60 L8 100 L10 60 L12 100 L14 60 L16 100 L18 60 L20 100 L22 60 L24 100 L26 60 L28 100 L30 60 L32 100 L34 60 L36 100 L38 60 L40 100 L42 60 L44 100 L46 60 L48 100 L50 60 L52 100 L54 60 L56 100 L58 60 L60 100 L62 60 L64 100 L66 60 L68 100 L70 60 L72 100 L74 60 L76 100 L78 60 L80 100 L82 60 L84 100 L86 60 L88 100 L90 60 L92 100 L94 60 L96 100 L98 60 L100 100 Z" stroke-width="0"></path>
                    </svg>
                    <svg class="decor visible-xs visible-sm" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 100 L5 60 L10 100 L5 60 L10 100 L15 60 L20 100 L25 60 L30 100 L35 60 L40 100 L45 60 L50 100 L55 60 L60 100 L65 60 L70 100 L75 60 L80 100 L85 60 L90 100 L95 60 L100 100" stroke-width="0"></path>
                    </svg>
                </div>


                <div class="container">
                    <header class="section-header">
                        <h1 class="headline super hairline hyper os-animation animated" data-os-animation="fadeInDown" data-os-animation-delay=".125s">It's very easy</h1>
                        <h3 class="hairline headline  os-animation animated" data-os-animation="fadeInDown" data-os-animation-delay=".250s">There are four steps that you need to follow</h3>
                        <!--                <p class="">There are four more steps that you need to follow</p>-->
                    </header>
                    <div class="row">
                        <ul class="list-unstyled row box-list horizontal-icon-border">
                            <li class="col-md-3 text-center os-animation animated" data-os-animation="fadeInLeft" data-os-animation-delay=".3s">
                                <div class="box-round box-medium">
                                    <div class="box-dummy"></div>
                                    <a class="box-inner" href="login-form.php">
                                        <i class="fa fa-desktop" data-animation="bounce"></i>

<!--                                        <img alt="" class="img-circle" src="assets/images/design/custom-icons/custom-icon-imac.png" data-animation="bounce">-->
                                    </a>
                                </div>
                                <h3 class="text-center ">

                                    <a href="login-form.php">

                                        Login

                                    </a>

                                </h3>
                                <p class="text-center">You can login with any device as you want.</p>
                            </li>
                            <li class="col-md-3 text-center os-animation animated" data-os-animation="fadeInLeft" data-os-animation-delay=".6s">
                                <div class="box-round box-medium">
                                    <div class="box-dummy"></div>
                                    <a class="box-inner " href="booking-form.php">
                                        <i class="fa fa-save" data-animation="swing"></i>
                                    </a>
                                </div>
                                <h3 class="text-center ">

                                    <a href="booking-form.php">

                                        Reserve

                                    </a>

                                </h3>
                                <p class="text-center">Just reserve a seat.</p>
                            </li>
                            <li class="col-md-3 text-center os-animation animated" data-os-animation="fadeInRight" data-os-animation-delay=".9s">
                                <div class="box-round box-medium">
                                    <div class="box-dummy"></div>
                                    <a class="box-inner " href="confirm-form.php">
                                        <i class="fa fa-gavel" data-animation="shake"></i>
                                    </a>
                                </div>
                                <h3 class="text-center ">

                                    <a href="confirm-form.php">

                                        Confirm

                                    </a>

                                </h3>
                                <p class="text-center">Confirm a seat that you have reserved.</p>
                            </li>
                            <li class="col-md-3 text-center os-animation animated" data-os-animation="fadeInRight" data-os-animation-delay="1.2s">
                                <div class="box-round box-medium">
                                    <div class="box-dummy"></div>
                                    <a class="box-inner " href="">
                                        <i class="fa fa-shield" data-animation="tada"></i>
                                    </a>
                                </div>
                                <h3 class="text-center ">

                                    <a href="#">

                                        Seat is yours!

                                    </a>

                                </h3>
                                <p class="text-center">No anybody can grab your seat, go check your seat!</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!--  -->

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

