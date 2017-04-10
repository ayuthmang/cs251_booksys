<?php
session_save_path("/tmp");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage | Angle HTML</title>
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
<header id="masthead" class="navbar navbar-sticky swatch-red-white" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">
                <img src="assets/images/logo.png" alt="One of the best themes ever">Angle
            </a>
        </div>
        <nav class="collapse navbar-collapse main-navbar" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown active"><a href =# class="dropdown-toggle"
                                               data-toggle = "dropdown">Home</a>
                </li>
                <li>
                    <?php
                    //                    print_r ($_SESSION);
                    if($_SESSION['C_ID']){
                        echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown"> 
									Hello!! '.$_SESSION['C_ID'].'</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="profile.php">Profile</a>';
                        echo '</li>';
                        if($_SESSION["C_TYPE"]==1){
                            echo '<li><a href="management.php" class="dropdown-toggle" class="dropdown active">Management</a>';
                            echo '</li>';
                        }
                        echo '<li><a href="logout.php">Logout</a>';
                        echo '</li>';
                        echo '</ul>';


                    }else{
                        header("login-form.html");
                    }

                    ?>
                </li>
            </ul>

        </nav>
    </div>
</header>
<div id="content" role="main">
    <section class="section swatch-white-red">
        <div class="container" align="center">
            <form action="profile-edit.php" method="post">
                UserID &nbsp
                <input type="text" name="cid" value=<?php echo htmlspecialchars($_SESSION['C_ID']); ?> disabled>
                <br> <br>
<!--                User Password-->
<!--                <input type="text" name="cpass" value="">-->
<!--                <br> <br>-->


                Name &nbsp
                <input type="text" name="cname" value="">
                <br> <br>

                Last Name &nbsp
                <input type="text" name="clastname" value="">
                <br> <br>

                Phone&nbsp
                <input type="text" name="cphone" value="">
                <br> <br>

                eMail&nbsp
                <input type="text" name="cmail" value="">
                <br> <br>

                Address&nbsp
                <input type="text" name="caddress" value="">
                <br> <br>
                <input type="submit" value="Update">

            </form>
        </div>
    </section>


    <footer id="footer" role="contentinfo">
        <section class="section swatch-red-white has-top">
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
