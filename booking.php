<?php
    ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    session_start();

    $servername = "188.166.248.254";
    $username = "blacksource_root"; // database id
    $password = "ifyounot"; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    /* Get post value from booking-form.php and then tokenizer to 2 pieces
       1: seatid
       2: what's time selected ?
       So, we will get $_REQUEST['selectedseatid'] like this

       1|0 --> this's meant seat 1 at time 8:00 - 9:30

       For time table
       -----------------------------
       8.00 - 9.30 : 0
       9.30 - 11.00 : 1
       11.00 - 12.30 : 2
       12.30 - 13.00 // break time
       13.30 - 15.00 : 3
       15.00 - 16.30 : 4
       16.30 - 18.00 : 5
       18.00 - 19.30 :6
       -----------------------------
    */


    //for split string with | (pipe)
    $result = explode('|', $_REQUEST['selectedseatid']);

    
    $fromSeatid = $result[0];
    $fromSelectedTime = $result[1];


    // $result = $conn->query($queryCheckIfStudentReservedThatSeat);
    // $data = $result->fetch_assoc();


?>
