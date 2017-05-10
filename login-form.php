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
                <!--<li class="dropdown menu-item-object-oxy_mega_menu ">-->
                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>-->

                <!--</li>-->
                <!--<li class="dropdown ">-->
                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Features</a>-->

                <!--</li>-->
                <!--<li class="dropdown ">-->
                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>-->

                <!--</li>-->
                <!--<li class="dropdown [object Object]">-->
                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio</a>-->

                <li class="dropdown active ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>

                </li>

                <li>
                    <a href="register-form.html" class="dropdown" data>Register</a>

                </li>
            </ul>
        </nav>
    </div>
</header>
<div id="content" role="main">
    <section class="section swatch-black-yellow">
        <div class="container">
            <header class="section-header underline ">
                <h1 class="headline hyper hairline">Login</h1>
            </header>
        </div>
        <div class="container" align="center">
            <form action="login.php" method="post">


                <div class="row text-center">
                    <div class="col-md-6 col-md-offset-3">
                        <form class="contact-form" id="contactForm">


                            <div class="form-group form-icon-group">
                                <input name="id" class="form-control" id="name" required="" type="text" placeholder="Your id">
                                <i class="fa fa-user"></i>
                            </div>


                            <div class="form-group form-icon-group">
                                <input name="pass" class="form-control" id="email" required="" type="password" placeholder="Your password">
                                <i class="fa fa-key"></i>
                            </div>


                            <div class="form-group text-center">
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
        <section class="section swatch-black-beige has-top">
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
