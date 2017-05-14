
<?php
    ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    session_start();

    $servername = "localhost";
    $username = "root"; // database id
    $password = ""; // database password
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

    $selectedSeatid = $result[0];
    $selectedSelectedTime = $result[1];

    $queryIfSeatExists = ("SELECT stuid_attime$selectedSelectedTime , status$selectedSelectedTime
                           FROM   seat
                           WHERE  seatid = $selectedSeatid");

    $result = conn->query(queryIfSeatExists);
    $result = result->fetch_assoc();

    var_dump($result);

    try {

    } catch (Exception $ex) {

    }

    print $queryIfSeatExists;
    // $result = $conn->query($queryCheckIfStudentReservedThatSeat);
    // $data = $result->fetch_assoc();


?>
