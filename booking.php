
<?php
  date_default_timezone_set('Asia/Bangkok');
  ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
  session_start();

  if(isset($_SESSION['uid'])){ //this is an administrator so donothing @_@
    print "Administrator can not use this function right now";
    return ;
  }

  if(isset($_SESSION['sid']) === false){
    print "Please login before booking" . ", <a href='login.php'>click here to login</a><br>";
    header("location:login.php");
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

  # seat that student click
  $selectedSeatid = $result[0];

  # time at student clicked range 0 - 6
  $selectedSelectedTime = $result[1];


  $queryIfSeatExists =
  "
  SELECT *
  FROM seat
  WHERE (stuid_attime0 = '".$_SESSION['sid']."' OR
  			 stuid_attime1 = '".$_SESSION['sid']."' OR
  			 stuid_attime2 = '".$_SESSION['sid']."' OR
  			 stuid_attime3 = '".$_SESSION['sid']."' OR
  			 stuid_attime4 = '".$_SESSION['sid']."' OR
  			 stuid_attime5 = '".$_SESSION['sid']."' OR
  			 stuid_attime6 = '".$_SESSION['sid']."'
  			)
  ";

  try {
    $result = $conn->query($queryIfSeatExists);
    $countFromResult = mysqli_num_rows($result);

    # If student already reserved seat in table 'seat'
    if($countFromResult >= 1){
      print "You already reserved seat" . ", <a href='booking-form.php'>click here to go back</a><br>";

    } else {
      // $result = $result->fetch_assoc(); # array(2) { ["stuid_attime1"]=> NULL ["status1"]=> string(1) "0" }
      $sqlReserveSeat ="UPDATE seat
                        SET stuid_attime$selectedSelectedTime = '".$_SESSION['sid']."' , seat.status$selectedSelectedTime = 1
                        WHERE seatid = $selectedSeatid;";
      $result = $conn->query($sqlReserveSeat);

      # if query succeed
      if($result){
        

        $currentTime = date('Y/m/d - G:i:s');
        $sql_InsertToLog =
        "
        INSERT INTO serverlog (sid, message)
        VALUES (".$_SESSION['sid'].", '[".$currentTime."] Reserved seat [stuid_attime$selectedSelectedTime , seat.status$selectedSelectedTime] succeed');
        ";

        // print $sql_InsertToLog;
        $conn->query($sql_InsertToLog);
        print "Reserve succeed " . ", <a href='booking-form.php'>click here to go back</a><br>";
      }else{

        $currentTime = date('Y/m/d - G:i:s');
        $sql_InsertToLog =
        "
        INSERT INTO serverlog (sid, message)
        VALUES (".$_SESSION['sid'].", '[".$currentTime."] Reserved seat [stuid_attime$selectedSelectedTime , seat.status$selectedSelectedTime] failed');
        ";
        // print $sql_InsertToLog;
        $conn->query($sql_InsertToLog);
        print "Failed to reserve seat $selectedSeatid " . ", <a href='booking-form.php'>click here to go back</a><br>";
      }
    }


  } catch (Exception $ex) {
    print "Failed [Exception] -> $ex " . ", <a href='booking-form.php'>click here to go back</a><br>";
  }
  $conn->close();

?>
