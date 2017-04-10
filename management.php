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
                            echo '<li><a href="management.php" class="dropdown active" class="dropdown-toggle">Management</a>';
                            echo '</li>';
                        }
                        echo '<li><a href="logout.php">Logout</a>';
                        echo '</li>';
                        echo '</ul>';

//                        if($_REQUEST['cdeleteuser'] != null){
//                            print "KUY";
//                            print "<br>";
//                            print_r ($_REQUEST);
//                        }


                        if(isset($_REQUEST['cdeleteuser']) != null && $_SESSION['C_TYPE'] == 1){
                            $sqlCommnd = "DELETE FROM `accounts` WHERE C_ID='".$_REQUEST['cdeleteuser']."' AND C_TYPE!=1" ;

                            $servername = "localhost";
                            $username = "root"; // database id
                            $password = ""; // database password
                            $dbname = "mydb"; //database name
                            $conn = new mysqli($servername,$username,$password,$dbname);

                            if($conn->query($sqlCommnd) === true){
                                echo "User '".$_REQUEST['cdeleteuser']."' was deleted successful. <br>";

                            }
                            else {
                                echo "Failed to delete user " . $conn->error;
                            }
                            $conn->close();



                            /* Test cases
                                INSERT INTO `accounts`(`C_ID`, `C_PASSWORD`, `C_TYPE`) VALUES ('test01','test',0);
                                INSERT INTO `accounts`(`C_ID`, `C_PASSWORD`, `C_TYPE`) VALUES ('test02','test',0);
                                INSERT INTO `accounts`(`C_ID`, `C_PASSWORD`, `C_TYPE`) VALUES ('test03','test',1);
                                INSERT INTO `accounts`(`C_ID`, `C_PASSWORD`, `C_TYPE`) VALUES ('test04','test',0);
                                INSERT INTO `accounts`(`C_ID`, `C_PASSWORD`, `C_TYPE`) VALUES ('test05','test',1);
                             */
                        }
                    }else{
                        header("login-form.php");
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
                Delete User &nbsp

                <input type="text" name="cdeleteuser" value="">
                <br> <br>
                <input type="submit" value="Execute">

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
