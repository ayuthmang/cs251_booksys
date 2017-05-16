<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(E_ERROR | E_PARSE);
// session_save_path("/tmp");
ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));


session_start();

date_default_timezone_set('Asia/Bangkok');

if (empty($_SESSION['fname'])) {
    header("location:login-form.php");
}

/*for get full time in 24 Hour format
https://www.w3schools.com/php/php_date.asp

$currentTime = date('G:i:s');

$hour = date('G');


*/
// echo $hour;
include("table.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>




    <script type="text/javascript">
        function display_ct() {
            var strcount
            var x = new Date()
            var x1= "Time: " + x.getHours( )+ ":" + x.getMinutes() + ":" + x.getSeconds();

//            var x1=x.getMonth() + "/" + x.getDate() + "/" + x.getYear();
//            x1 = x1 + " - " + x.getHours( )+ ":" + x.getMinutes() + ":" + x.getSeconds();
            document.getElementById('ct').innerHTML = x1;

            tt=display_c();
        }
        function display_c(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct()',refresh)
        }
    </script>







    <title>Select a Seat | Booking System</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
    <link rel="stylesheet" href="assets/css/swatch-white-black.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-blue.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-green.min.css">
    <link rel="stylesheet" href="assets/css/swatch-yellow-black.min.css">
    <link rel="stylesheet" href="assets/css/swatch-red-white.min.css">
    <link rel="stylesheet" href="assets/css/swatch-white-red.min.css">

    <link rel="stylesheet" href="assets/css/fonts.min.css" media="screen">
</head>
<body onload="display_ct()">

<header id="masthead" class="navbar navbar-sticky swatch-black-yellow" role="banner">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
    <a href="./index.php" class="navbar-brand">
    <img src="assets/images/logo.png" alt="">Select a Seat | Booking System
    </a>

</div>
    <nav class="collapse navbar-collapse main-navbar" role="navigation">
    <ul class="nav navbar-nav navbar-right">


    <li class=""><a href=# id="ct" class="dropdown-toggle"
                                   data-toggle="dropdown">Time: </a>
    </li>

    <li class="dropdown active"><a href=# class="dropdown-toggle"
                                   data-toggle="dropdown">Home</a>
    </li>



        <li>

        <?php

                    //print_r ($_SESSION);
                    if (isset($_SESSION['sid']) && $_SESSION['sid'] != '') {
                        echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown">
									Student ' . $_SESSION['fname'] . '</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="profile.php">Profile</a>';
                        echo '</li>';
                        if (isset($_SESSION['C_TYPE']) && $_SESSION["C_TYPE"] == 1) {
                            echo '<li><a href="admin-panel.php">Control Panel</a>';
                            echo '</li>';
                        }
                        echo '<li><a href="logout.php">Logout</a>';
                        echo '</li>';


                        echo '</ul>';
                    } elseif (isset($_SESSION['uid']) && $_SESSION['uid'] != '') {
                        //if an administrator
                        echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown">
									Administrator ' . $_SESSION['fname'] . '</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="profile.php">Profile</a>';
                        echo '</li>';
                        echo '<li><a href="admin-panel.php">Control Panel</a>';
                        echo '</li>';
                        echo '<li><a href="logout.php">Logout</a>';
                        echo '</li>';
                        echo '</ul>';
                    } else {
                        echo '<li class="">';
                        echo '<a href =login-form.html >Login</a>';
                        echo '</li>';
                        echo '<li class="">';
                        echo '<a href =register-form.html>Register</a>';
                        echo '</li>';

                    }

                    ?>
                </li>
            </ul>

        </nav>
    </div>
</header>
<div id="content" role="main">
    <!--    <section class="section swatch-black-beige">
            <div class="container" align="center">
                <form action="color-swatches.html">
                  First name:<br>
                  <input type="text" name="firstname" value="Mickey">
                  <br>
                  Last name:<br>
                  <input type="text" name="lastname" value="Mouse">
                  <br><br>
                  <input type="submit" value="Submit">
                </form>
            </div>
        </section>-->

    <section class="section swatch-black-yellow">
        <div class="container">


            <header class="section-header underline">        
                <h1 class="headline hyper hairline">Select a Seat</h1>
            </header>
            

            <div class="text-left">
                <div class="row-fluid">
                    <div class="span12">
                        <table class="swatch-black-yellow table table-hover">
                        <form action='booking.php' method='post'>
                            <thead>
                            <tr>
                                <th>Seat#</th>

                                <th>8.00 - 9.30</th>

                                <th>9.30 - 11.00</td>

                                <th>11.00 - 12.30</th>

                                <th>13.30 - 15.00</th>

                                <th>15.00 - 16.30</th>

                                <th>16.30 - 18.00</th>

                                <th>18.00 - 19.30</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $mytable = new table();
                                $mytable->printTableBookingPage();
                            ?>

                            </tbody>
                        </form>
                        </table>
                    </div>
                </div>
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
