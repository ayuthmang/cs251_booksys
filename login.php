<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_save_path("/tmp");
    session_start();

    $servername = "localhost";
    $username = "root"; // database id
    $password = ""; // database password
    $dbname = "mydb"; //database name
    $conn = new mysqli($servername,$username,$password,$dbname);
    //    print_r($_REQUEST);
    if($conn->connect_error){
//        print $conn->connect_error;
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_REQUEST['cid'];
    $pass = $_REQUEST['cpass'];

    //SELECT `C_ID`, `C_PASSWORD` FROM `accounts` WHERE C_ID='admin' AND C_PASSWORD='bay'

    $loginQuery = "SELECT `C_ID`, `C_PASSWORD` , `C_TYPE` FROM `accounts` WHERE C_ID='".$id."' AND C_PASSWORD='".$pass."' " ;
    $objResult = mysqli_fetch_array( $conn->query($loginQuery));
    //print_r ($objResult);
    print "<br>";
    if (!$objResult){
        print "User name or password is incorrect";
    }
    else{
        $_SESSION['C_ID'] = $objResult['C_ID'];
        $_SESSION['C_TYPE'] = $objResult['C_TYPE'];
        session_write_close();
    //    print_r ($_SESSION);
        if($_SESSION['type'] === 1){
            echo "Welcome Administrator ".$_SESSION['C_ID']." ";
        }
        else {
            echo "Welcome User ".$_SESSION['C_ID']." <br>" ;
            echo "Auto redirect to index.php in 3 secconds";
    //        sleep(5);
            header("location:index.php");
        }


}

$conn->close();