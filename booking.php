<?php
    ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

    session_start();

    var_dump($_SESSION);

//    var_dump($_REQUEST);
//    print "<br>";
//    var_dump($_POST);
//    print "<br>";
//    var_dump($_GET);

    $queryCheckIfStudentReservedThatSeat = "
                      SELECT seat.sid 
                      FROM seat
                      WHERE seat.seatid = '".$_REQUEST['selectedseatid']."' ";

//    print $queryCheckIfStudentReservedThatSeat;

    $servername = "188.166.248.254";
    $username = "blacksource_root"; // database id
    $password = "ifyounot"; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

    }

    $result = $conn->query($queryCheckIfStudentReservedThatSeat);
    $data = $result->fetch_assoc();

    $studentIdInDatabase = $data['sid'];

    if($studentIdInDatabase === $_SESSION['sid']){
        echo "IS EQUAL";

        $queryRemoveCurrentSeatFromDatabase = "UPDATE seat
                                               set seat.sid='' , seat.status=0
                                               WHERE seat.seatid='".$_REQUEST['selectedseatid']."'";
        $conn->query($queryCheckIfStudentReservedThatSeat);
        if($conn === true){
            echo "Remove seat success!";
        }else{
            echo "Remove seat failed <br>";
        }

    }else{
        echo "Please select your seat!";
    }
//    var_dump($result);

//    print $data['sid'];

//    print $result;
//    print $result;


//print_r($_REQUEST);
// $input2 = "hello,there";
//var_dump( explode( '|', $_REQUEST[] ) );

?>