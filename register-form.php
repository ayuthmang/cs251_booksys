<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Booking System</title>
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

                <!--</li>-->
                <li class="dropdown">
                    <a href="login-form.php" class="dropdown-toggle">Login</a>
                </li>

                   <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register</a>
                </li>

                <li class="">
                    <a href ="help.php" >Help</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div id="content" role="main">
    <section class="section swatch-black-yellow">
        <div class="container" align="center">
            <div class="container">
                <header class="section-header underline ">
                    <h1 class="headline hyper hairline">Registration</h1>
                </header>
            </div>

            <form action="register.php" method="post">

                Student ID&nbsp;
                <input type="text" name="sid">
                <br><br>
                First Name&nbsp;
                <input type="text" name="fname">
                <br><br>
                Last Name&nbsp;
                <input type="text" name="lname">
                <br><br>
                Password&nbsp;
                <input type="password" name="password">
                <br><br>
                <input type="submit" value="Submit">
            </form>
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
