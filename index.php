<?php
     // error_reporting(E_ALL ^ E_NOTICE);
     // error_reporting(E_ERROR | E_PARSE);
     // session_save_path("/tmp");
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
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
                        <img src="assets/images/logo.png" alt="">Lab107 Booking System
                    </a>
                </div>
                <nav class="collapse navbar-collapse main-navbar" role="navigation">
                    <ul class="nav navbar-nav navbar-right">
                    	<li class="dropdown active"><a href =# class="dropdown-toggle"
                    	data-toggle = "dropdown">Home</a></li>
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
									echo '<li><a href="management.php">Management</a>';
									echo '</li>';
								}
								echo '<li><a href="logout.php">Logout</a>';
								echo '</li>';


                                echo '</ul>';
							} elseif(isset($_SESSION['uid']) && $_SESSION['uid'] != ''){
								echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown"> 
									Administrator '.$_SESSION['fname'].'</a>';
								echo '<ul class="dropdown-menu">';
								echo '<li><a href="profile.php">Profile</a>';
								echo '</li>';
                                echo '<li><a href="management.php">Management</a>';
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

            <section class="section swatch-beige-black">
                <div class="container">
                    <header class="section-header underline text-center">
                        <h1 class="headline super hairline "><b><?php echo ' '.$_SESSION['fname'].',  ' ?> Hello.</b></h1>
                    </header>

                    <div class="text-center">
                        <a class="btn btn-primary btn-lg btn-icon-right pull-center" href="booking-form.php">
                            Booking Now
                            <div class="hex-alt hex-alt-big">
                                <i class="fa fa-desktop" data-animation="tada"></i>
                            </div>
                        </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <a class="btn btn-primary btn-lg btn-icon-right pull-center" href="#">
                            CONFIRM BOOKING
                            <div class="hex-alt hex-alt-big">
                                <i class="fa fa-rocket" data-animation="tada"></i>
                            </div>
                        </a>

                    </div>

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
