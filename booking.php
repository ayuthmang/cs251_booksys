<?php
    ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

    session_start();

//    var_dump($_SESSION);

//    var_dump($_REQUEST);
//    print "<br>";
//    var_dump($_POST);
//    print "<br>";
//    var_dump($_GET);

    $queryCheckIfStudentReservedThatSeat = "
                      SELECT seat.seatid , seat.sid
                      FROM seat
                      WHERE seat.sid = '".$_SESSION['sid']."' ";

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


//    print_r ($data);

//    $studentSeatIdInDatabase = $data['seatid'];
//    $studentIdInDatabase = $data['sid'];
//    print $studentSeatIdInDatabase;
//    print $studentIdInDatabase;

    if(isset($data)){ //if data not null
//        echo "<BR>";
//        print $_REQUEST['selectedseatid'];
//        print $data['sid'];

        if($_REQUEST['selectedseatid'] === $data['seatid']){ //do some revoke this seat
            $queryRemoveCurrentSeatFromDatabase = "UPDATE seat
                                                   set seat.sid='' , seat.status=0
                                                   WHERE seat.seatid='".$_REQUEST['selectedseatid']."'";

            $conn->query($queryRemoveCurrentSeatFromDatabase);
            if($conn->affected_rows === 1){
                echo "<br>Remove seat success!<br>";
            }else{
                echo "<br>[Failed] Remove seat failed <br>";
                echo mysqli_error($conn);
            }
        }
    }else{ //do some reservation seat

        $queryReservationSeatInDatabase = "UPDATE seat
                                           SET seat.sid='".$_SESSION['sid']."' , seat.status=1
                                           WHERE seatid=".$_REQUEST['selectedseatid'].";  ";
    $conn->query($queryReservationSeatInDatabase);

//        echo "<br>";
//        print $queryReservationSeatInDatabase;
//        echo "<br>";
        if($conn->affected_rows === 1){
            echo "<br>Reservation seat ".$_REQUEST['selectedseatid']." success";
        }else{
            echo "<br>[Failed] Reservation seat ".$_REQUEST['selectedseatid']." failed <br>";
            echo mysqli_errno($conn);
        }


    }



    /*check if found student id in database:
        if selectedseatid ===


    */
//if(isset($studentIdInDatabase)){ //if not found student in database then go RESERVATION
//    //do some reservation seat.
//
//    $queryReservationSeatInDatabase = "UPDATE seat
//                                           SET seat.sid='".$_SESSION['sid']."' , seat.status=1
//                                           WHERE seatid=".$_REQUEST['selectedseatid'].";  ";
//    $conn->query($queryReservationSeatInDatabase);
//
////        echo "<br>";
////        print $queryReservationSeatInDatabase;
////        echo "<br>";
//    if($conn->affected_rows === 1){
//        echo "<br>Reservation seat ".$_REQUEST['selectedseatid']." success";
//    }else{
//        echo "<br>[Failed] Reservation seat ".$_REQUEST['selectedseatid']." failed <br>";
//        echo mysqli_errno($conn);
//    }
//}
//else{
//    //do some remove seat
//    if($_REQUEST['selectedseatid'] === $studentSeatIdInDatabase){
//        if($studentIdInDatabase === $_SESSION['sid']){
//            echo "IS EQUAL";
//
//
//
//            $queryRemoveCurrentSeatFromDatabase = "UPDATE seat
//                                                   set seat.sid='' , seat.status=0
//                                                   WHERE seat.seatid='".$_REQUEST['selectedseatid']."'";
//            $conn->query($queryRemoveCurrentSeatFromDatabase);
//            if($conn->affected_rows === 1){
//                echo "<br>Remove seat success!<br>";
//            }else{
//                echo "<br>[Failed] Remove seat failed <br>";
//                echo mysqli_errno($conn);
//            }
//
//        }
//    }


    //for remove current seat if value studentID from database is equal my session studentid
//    if($studentIdInDatabase === $_SESSION['sid']){
//        echo "IS EQUAL";
//
//
//
//        $queryRemoveCurrentSeatFromDatabase = "UPDATE seat
//                                               set seat.sid='' , seat.status=0
//                                               WHERE seat.seatid='".$_REQUEST['selectedseatid']."'";
//        $conn->query($queryRemoveCurrentSeatFromDatabase);
//        if($conn->affected_rows === 1){
//            echo "<br>Remove seat success!<br>";
//        }else{
//            echo "<br>[Failed] Remove seat failed <br>";
//            echo mysqli_errno($conn);
//        }
//
//    }else{
//
//        //do some reservation seat.
//
//        $queryReservationSeatInDatabase = "UPDATE seat
//                                           SET seat.sid='".$_SESSION['sid']."' , seat.status=1
//                                           WHERE seatid=".$_REQUEST['selectedseatid'].";  ";
//        $conn->query($queryReservationSeatInDatabase);
//
////        echo "<br>";
////        print $queryReservationSeatInDatabase;
////        echo "<br>";
//        if($conn->affected_rows === 1){
//            echo "<br>Reservation seat ".$_REQUEST['selectedseatid']." success";
//        }else{
//            echo "<br>[Failed] Reservation seat ".$_REQUEST['selectedseatid']." failed <br>";
//            echo mysqli_errno($conn);
//        }
//    }


?>