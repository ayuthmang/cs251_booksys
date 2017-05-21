<?php
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    // session_save_path("/tmp");
    session_start();

    if(isset($_SESSION['sid']) || isset($_SESSION['uid'])){
        //if userid or student id is already storedi nsession then redirect to index.php

        header("location:index.php");
    }
    // session_reset();

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Angle HTML</title>
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

<div id="content" role="main">
<header id="masthead" class="navbar navbar-sticky swatch-black-yellow" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">
                <img src="assets/images/logo.png" alt="One of the best themes ever">Booking System
            </a>
        </div>
        <nav class="collapse navbar-collapse main-navbar" role="navigation">
            <!--<div class="sidebar-widget widget_search pull-right">-->
                <!--<form>-->
                    <!--<div class="input-group">-->
                        <!--<input class="form-control" type="text" placeholder="Search here....">-->
                        <!--<span class="input-group-btn">-->
                            <!--<button class="btn" type="submit">-->
                                <!--<i class="fa fa-search"></i>-->
                            <!--</button>-->
                        <!--</span>-->
                    <!--</div>-->
                <!--</form>-->
            <!--</div>-->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="index.php">Home</a>

                </li>

                <li class="dropdown active ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                </li>

                <li>
                    <a href="register-form.html" class="dropdown" data>Register</a>
                </li>

                <li class="">
                    <a href ="help.php" >Help</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div id="content" role="main">
    <section class="section swatch-black-beige">

        <div class="container">
            <header class="section-header underline os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".0s" style="animation-delay: 0s;">
                <h1 class="headline hyper hairline">Login</h1>
            </header>
        </div>
        <div class="container" align="center">
            <form action="login.php" method="post">

                <div class="row text-center">
                    <div class="col-md-6 col-md-offset-3">
                        <form class="contact-form" id="contactForm">

                            <div class="form-group form-icon-group os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".0s" style="animation-delay: 0s;">
                                <input name="id" class="form-control" id="name" required="" type="text" placeholder="Your id">
                                <i class="fa fa-user" data-animation="bounce"></i>
                            </div>

                            <div class="form-group form-icon-group os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".3s" style="animation-delay: 3s;">
                                <input name="pass" class="form-control" id="email" required="" type="password" placeholder="Your password">
                                <i class="fa fa-key" data-animation="bounce"></i>
                            </div>

                            <div class="swatch-black-yellow hn form-group text-center os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay=".6s" style="animation-delay: 6s;">
                                <button class="btn btn-primary btn-icon btn-icon-right" type="submit">
                                    Login
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
                <!-- <svg class="decor hidden-xs hidden-sm" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 100 Q 2.5 40 5 100 Q 7.5 40 10 100 Q 12.5 40 15 100 Q 17.5 40 20 100 Q 22.5 40 25 100 Q 27.5 40 30 100 Q 32.5 40 35 100 Q 37.5 40 40 100 Q 42.5 40 45 100 Q 47.5 40 50 100 Q 52.5 40 55 100 Q 57.5 40 60 100 Q 62.5 40 65 100 Q 67.5 40 70 100 Q 72.5 40 75 100 Q 77.5 40 80 100 Q 82.5 40 85 100 Q 87.5 40 90 100 Q 92.5 40 95 100 Q 97.5 40 100 100 " stroke-width="0"></path>
                </svg> -->
                <!-- <svg class="decor hidden-xs hidden-sm" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 100 L0 50 L2 50 L2 100 L4 100 L4 50 L6 50 L6 100 L8 100 L8 50 L10 50 L10 100 L12 100 L12 50 L14 50 L14 100 L16 100 L16 50 L18 50 L18 100 L20 100 L20 50 L22 50 L22 100 L24 100 L24 50 L26 50 L26 100 L28 100 L28 50 L30 50 L30 100 L32 100 L32 50 L34 50 L34 100 L36 100 L36 50 L38 50 L38 100 L40 100 L40 50 L42 50 L42 100 L44 100 L44 50 L46 50 L46 100 L48 100 L48 50 L50 50 L50 100 L52 100 L52 50 L54 50 L54 100 L56 100 L56 50 L58 50 L58 100 L60 100 L60 50 L62 50 L62 100 L64 100 L64 50 L66 50 L66 100 L68 100 L68 50 L70 50 L70 100 L72 100 L72 50 L74 50 L74 100 L76 100 L76 50 L78 50 L78 100 L80 100 L80 50 L82 50 L82 100 L84 100 L84 50 L86 50 L86 100 L88 100 L88 50 L90 50 L90 100 L92 100 L92 50 L94 50 L94 100 L96 100 L96 50 L98 50 L98 100 L100 100 " stroke-width="0"></path>
                </svg>
                <svg class="decor visible-xs visible-sm" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 100 L0 50 L5 50 L5 100 L10 100 L10 50 L15 50 L15 100 L20 100 L20 50 L25 50 L25 100 L30 100 L30 50 L35 50 L35 100 L40 100 L40 50 L45 50 L45 100 L50 100 L50 50 L55 50 L55 100 L60 100 L60 50 L65 50 L65 100 L70 100 L70 50 L75 50 L75 100 L80 100 L80 50 L85 50 L85 100 L90 100 L90 50 L95 50 L95 100 L100 100 " stroke-width="0"></path>
                </svg> -->
            </div>
        </section>

        <!-- <section class="section swatch-black-yellow has-top">
            <div class="decor-top">
                <svg class="decor" height="100%" preserveaspectratio="none" version="1.1" viewbox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0 L50 100 L100 0 L100 100 L0 100" stroke-width="0"></path>
                </svg>
            </div>

        </section> -->
    </footer>
</div>
<a class="go-top hex-alt" href="javascript:void(0)">
    <i class="fa fa-angle-up"></i>
</a>
<script src="assets/js/packages.min.js"></script>
<script src="assets/js/theme.min.js"></script>
</body>
</html>
