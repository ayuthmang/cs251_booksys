<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(E_ERROR | E_PARSE);
// session_save_path("/tmp");
ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));


session_start();

//var_dump($_SESSION);

//print $_SESSION['sid'];
//print $_SESSION['uid'];


if (empty($_SESSION['fname'])) {
    header("location:login-form.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

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
    <img src="assets/images/logo.png" alt="">Select a Seat | Booking System
    </a>

</div>
    <nav class="collapse navbar-collapse main-navbar" role="navigation">
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown active"><a href=# class="dropdown-toggle"
                                   data-toggle="dropdown">Home</a></li>
        <li>

        <?php
                    //                        print_r ($_SESSION);
                    if (isset($_SESSION['sid']) && $_SESSION['sid'] != '') {
                        echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown"> 
									Student ' . $_SESSION['fname'] . '</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="profile.php">Profile</a>';
                        echo '</li>';
                        if (isset($_SESSION['C_TYPE']) && $_SESSION["C_TYPE"] == 1) {
                            echo '<li><a href="management.php">Management</a>';
                            echo '</li>';
                        }
                        echo '<li><a href="logout.php">Logout</a>';
                        echo '</li>';


                        echo '</ul>';
                    } elseif (isset($_SESSION['uid']) && $_SESSION['uid'] != '') {
                        echo '<a href ="#" class ="dropdown-toggle" data-toggle="dropdown"> 
									Administrator ' . $_SESSION['fname'] . '</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="profile.php">Profile</a>';
                        echo '</li>';
                        echo '<li><a href="management.php">Management</a>';
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
            <header class="section-header underline text-center">
                <h1 class="headline super lead">Select a Seat</h1>
            </header>

            <div class="text-left">
                <div class="row-fluid">
                    <div class="span12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Own by</th>
                                <th>Status</th>
                                <th>Select</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //SELECT * from seat
                            $mySqlCommand = "SELECT * FROM seat";
                            $servername = "188.166.248.254";
                            $username = "blacksource_root"; // database id
                            $password = "ifyounot"; // database password
                            $dbname = "blacksource_bksys"; //database name
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);

                            }
                            $query = "SELECT * FROM seat";

                            if ($result = $conn->query($query)) {

                                while ($row = $result->fetch_assoc()) {
                                    //printf ("%s (%s) %s\n <br>", $row["seatid"], $row["sid"] , $row["status"]);
                                    echo "<tr>";
                                    echo "<td>" . $row['seatid'] . "</td>";
                                    echo "<td>" . $row['sid'] . "</td>";
                                    $status = "Unknown";
                                    switch ($row['status']) {
                                        case 0: //avaliable
                                            $status = "Avaliable";
                                            echo "<td class='alert-success'>$status</td>";
                                            echo "<td>";
                                            echo "<form action='booking.php' method='post'>";
                                            echo "  <button name='".$row['seatid']."' class='btn btn-success' type='submit' id='" . $row['seatid'] . "|" . $row['sid'] . "'>
                                                     Reservation
                                                    </button>
                                                  ";
                                            echo "</form>";

                                            echo "</td>";
                                            echo "</tr>";
                                            break;
                                        case 1: //waiting for confirmation
                                            $status = "Waiting for confirmation";
                                            echo "<td class='alert-warning'>$status</td>";
                                            echo "
                                                      
                                                         <td>
                                                            <a class='btn btn-warning' href='confirm-form.php'>Goto Confirm Page</a>
                                                         </td>
                                                      
                                                 ";

                                            /*
                                                            <button class='btn btn-success' type='submit'id='".$row['seatid']."|".$row['sid']."' name='".$row['seatid']."|".$row['sid']."'>Confirm Seat</button>
                                                            
                                                            <button class='btn btn-danger' type='submit' id='".$row['seatid']."|".$row['sid']."'>Revoke Seat</a>
                                            */
                                            echo "</tr>";
                                            break;
                                        case 2: //confirmed
                                            $status = "Not Avaliable";
                                            echo "<td class='validation_error'>$status</td>";


                                            echo "<td>";
                                            echo "<form action='booking.php' method='post'>";

                                            echo "<button type='submit' class='btn btn-danger' name='selectedseatid' value='".$row['seatid']."'>
                                                    Revoke Seat
                                                  </button>
                                                  ";
                                            echo "</form>";

                                            echo "</td>";
                                            echo "</tr>";

                                            break;
                                    }


//                                        echo "<td>$status</td>";

                                }
                                $result->free();
                            }

                            ?>
                            <!--                            <td>1</td>-->
                            <!--                            <td>Mark</td>-->
                            <!--                            <td>Otto</td>-->
                            <!--                            <td>@mdo</td-->

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            </tbody>
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
