<?php
    error_reporting(E_ALL ^ E_NOTICE);


    session_reset();
    session_save_path("/tmp");
    session_start();

    $servername = "188.166.248.254";
    $username = "blacksource_root"; // database id
    $password = "ifyounot"; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername,$username,$password,$dbname);
    //    print_r($_REQUEST);
    if($conn->connect_error){
//        print $conn->connect_error;
        die("Connection failed: " . $conn->connect_error);
    }
    $isAdmin = true;
    $id = $_REQUEST['id'];
    $pass = $_REQUEST['pass'];

    //SELECT `C_ID`, `C_PASSWORD` FROM `accounts` WHERE C_ID='admin' AND C_PASSWORD='bay'

    //SELECT 'uid' FROM admin WHERE (uid = 'ID' AND password = 'pass')
    //SELECT sid , fname , priority FROM student WHERE sid='' AND password='';
//"SELECT uid , fname FROM admin WHERE uid='$id' AND password='$pass'";

    $loginStudentQuery = "SELECT sid , fname , priority FROM student WHERE sid='$id' AND password='$pass' ";
    $loginAdminQuery = "SELECT uid , fname FROM admin WHERE uid='$id' AND password='$pass'";


//    print $loginStudentQuery;
//    print $loginAdminQuery;

//    print $loginQuery;
    $objResult = mysqli_fetch_array($conn->query($loginStudentQuery));
    if(!$objResult){ //ifnot student
        $objResult = mysqli_fetch_array($conn->query($loginAdminQuery));
        if($objResult){ // if admin
            $_SESSION['uid'] = $objResult['uid'];
            $_SESSION['fname'] = $objResult['fname'];
            $conn->close();
            echo "Welcome admin ".$_SESSION['fname']." <br>";
            echo "Auto redirect to home in 3 secconds ...";
            sleep(3);
            header("location:index.php");
        }

    }else{
        print_r($objResult);
        $_SESSION['sid'] = $objResult['sid'];
        $_SESSION['fname'] = $objResult['fname'];
        $_SESSION['priority'] = $objResult['priority'];
        $conn->close();
        echo "Welcome student ".$_SESSION['fname']." <br>";
        echo "Auto redirect to home in 3 secconds ...";
        sleep(3);
        header("location:index.php");
    }

//    print_r($_SESSION);
//    print_r($objResult);
    session_write_close();
    $conn->close();
    print "User name or password is incorrect";


//    print_r($objResult);
//    print_r($_SESSION);

//    if (!$objResult){
//        print "User name or password is incorrect";
//        $isAdmin = false;
//    }
//    else{
//
//        //try to connect db student once
//        $_SESSION['uid'] = $objResult['uid'];
//        $_SESSION['C_TYPE'] = $objResult['C_TYPE'];
//        session_write_close();
//    //    print_r ($_SESSION);
//        if($_SESSION['type'] === 1){
//            echo "Welcome Administrator ".$_SESSION['C_ID']." ";
//        }
//        else {
//            echo "Welcome User ".$_SESSION['C_ID']." <br>" ;
//            echo "Auto redirect to index.php in 3 secconds";
//    //        sleep(5);
//            header("location:index.php");
//        }
//
//
//}
