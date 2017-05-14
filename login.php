<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home | Booking System</title>
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
</meta>

<?php
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    // session_save_path("/tmp");
    session_start();

    if(isset($_SESSION['sid']) || isset($_SESSION['uid'])){
        header("location:index.php");
    }
    // session_reset();


    $servername = "localhost";
    $username = "root"; // database id
    $password = ""; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername,$username,$password,$dbname);


    //work with thai
    mysqli_set_charset($conn, "utf8");


    if($conn->connect_error){
        print $conn->connect_error;
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


    $loginSucceed = false;
    $objResult = mysqli_fetch_array($conn->query($loginStudentQuery));
    if(!$objResult){ //ifnot student
        $objResult = mysqli_fetch_array($conn->query($loginAdminQuery));
        if($objResult){ // if admin
            $_SESSION['uid'] = $objResult['uid'];
            $_SESSION['fname'] = $objResult['fname'];

            $currentTime = date('Y/m/d - G:i:s');
            $sql_InsertToLog =
            "
            INSERT INTO serverlog (sid, message)
            VALUES ('".$id."' , '[".$currentTime."] Login successful');
            ";
            $conn->query($sql_InsertToLog);
            echo "Welcome admin ".$_SESSION['fname']." <br>";
//            echo "Auto redirect to home in 3 secconds ...";
//            sleep(3);
            header("location:index.php");
            $loginSucceed = true;
        }

    }else{
        $_SESSION['sid'] = $objResult['sid'];
        $_SESSION['fname'] = $objResult['fname'];
        $_SESSION['priority'] = $objResult['priority'];
        // $conn->close();
        echo "Welcome student ".$_SESSION['fname']." <br>";

        $loginSucceed = true;
//      echo "Auto redirect to home in 3 secconds ...";
//      sleep(3);


        $currentTime = date('Y/m/d - G:i:s');

        // print $currentTime;
        $sql_InsertToLog =
        "
        INSERT INTO serverlog (sid, message)
        VALUES ('".$_SESSION['sid']."' , '[".$currentTime."] Login successful');
        ";

        $conn->query($sql_InsertToLog);


        session_write_close();
        header("location:index.php");
    }
    if(!$loginSucceed){

        $currentTime = date('Y/m/d - G:i:s');
        $sql_InsertToLog =
        "
        INSERT INTO serverlog (sid, message)
        VALUES (NULL, '[".$currentTime."] [user=".$id.",pass=".$pass."] Login failed , incorrect username or password');
        ";

        // print $sql_InsertToLog;
        $conn->query($sql_InsertToLog);
        print "User name or password is incorrect";
    }
    $conn->close();
    session_write_close();
?>
