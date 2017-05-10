<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_reset();
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    // session_save_path("/tmp");
    session_start();

    // print session_save_path();

    $servername = "188.166.248.254";
    $username = "blacksource_root"; // database id
    $password = "ifyounot"; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername,$username,$password,$dbname);


    //work with thai
    mysqli_set_charset($conn, "utf8");



    //    print_r($_REQUEST);
    if($conn->connect_error){
//        print $conn->connect_error;
        die("Connection failed: " . $conn->connect_error);
    }
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
    $loginSucceed = false;
    $objResult = mysqli_fetch_array($conn->query($loginStudentQuery));
    if(!$objResult){ //ifnot student
        $objResult = mysqli_fetch_array($conn->query($loginAdminQuery));
        if($objResult){ // if admin
            $_SESSION['uid'] = $objResult['uid'];
            $_SESSION['fname'] = $objResult['fname'];
            $conn->close();
            echo "Welcome admin ".$_SESSION['fname']." <br>";
//            echo "Auto redirect to home in 3 secconds ...";
//            sleep(3);
            header("location:index.php");
            $loginSucceed = true;
        }

    }else{
        // print_r($objResult);
        $_SESSION['sid'] = $objResult['sid'];
        $_SESSION['fname'] = $objResult['fname'];
        $_SESSION['priority'] = $objResult['priority'];
        // $conn->close();
        echo "Welcome student ".$_SESSION['fname']." <br>";

        $loginSucceed = true;
//        echo "Auto redirect to home in 3 secconds ...";
//        sleep(3);

//        var_dump($objResult);
        $sql_InsertToLog = 
        "
        INSERT INTO serverlog (sid, message) 
        VALUES ('".$_SESSION['sid']."' , 'Login to server');
        ";
        $conn->query($sql_InsertToLog);


        // header("location:index.php");
        session_write_close();
    }
    if(!$loginSucceed){
        

        $sql_InsertToLog = 
        "
        INSERT INTO serverlog (sid, message) 
        VALUES ('".$id."' , 'Login to failed');
        ";

        $conn->query($sql_InsertToLog);


        print "User name or password is incorrect";
        // $conn->close();
    }
    $conn->close();
    session_write_close();
    