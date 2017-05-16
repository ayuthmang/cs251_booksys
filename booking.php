
<?php
    ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    session_start();

    if(isset($_SESSION['uid'])){ //this is an administrator so donothing @_@
      print "Administrator can not use this function right now";
    }

    if(isset($_SESSION['sid']) === false){
      print "Please login before booking" . ", <a href='login.php'>click here to login</a><br>";
      // header("location:login.php");
    }
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


    // $queryIfStudentHasNameInDatabase =
    //  "SELECT *
    //   FROM seat
    //   WHERE
    //     stuid_attime0 = $_SESSION['sid'] or
    //     stuid_attime1 = $_SESSION['sid'] or
    //     stuid_attime2 = $_SESSION['sid'] or
    //     stuid_attime3 = $_SESSION['sid'] or
    //     stuid_attime4 = $_SESSION['sid'] or
    //     stuid_attime5 = $_SESSION['sid'] or
    //     stuid_attime6 = $_SESSION['sid'] ";
    //
    // $queryIfStudentHasNameInSeat = ("SELECT stuid_attime$selectedSelectedTime , status$selectedSelectedTime
    //                                  FROM   seat
    //                                  WHERE  seatid = $selectedSeatid");



    // print $queryIfStudentHasNameInSeat;
    try {
      $result = $conn->query($queryIfSeatExists);
      $result = $result->fetch_assoc(); # array(2) { ["stuid_attime1"]=> NULL ["status1"]=> string(1) "0" }

      $studentAtTime = $result["stuid_attime$selectedSelectedTime"];

      # CAUTION! --> this var can be NULL
      $seatStatusAtTime = $result["status$selectedSelectedTime"];

      // print $studentAtTime;
      // print $seatStatusAtTime;


      # check if student id from query not match in session studentID
      if($studentAtTime != $_SESSION['sid'] && $seatStatusAtTime != 0){
        print "This seat is not avalible right now." . "<br>";
        print "Please try again later" . "<br>";
        print '<input action="action" onclick="history.go(-1);" type="button" value="Back" />';
      }
      # if studentid match in query and session
      elseif ($studentAtTime == $_SESSION['sid'] && $seatStatusAtTime == 1) {
        print "You've already reserve this seat please <a href='confirm-form.php'>go to confirm page</a>" . "<br>";
      }
      # if studentid match in query and session
      elseif ($studentAtTime == $_SESSION['sid'] && $seatStatusAtTime == 2) {
        print "Other people've already reserved this seat please <a href='confirm-form.php'>go to confirm page</a>" . "<br>";
      }
      #if this seat avalible for reserve
      elseif ($studentAtTime === NULL && $seatStatusAtTime == 0){
        $queryReserveThisSeat =("UPDATE seat
                                 SET  stuid_attime$selectedSelectedTime = '".$_SESSION['sid']."', status$selectedSelectedTime = 1
                                 WHERE seat.seatid = $selectedSeatid ");
        print $queryReserveThisSeat;
      }

    } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    $conn->close();
?>
