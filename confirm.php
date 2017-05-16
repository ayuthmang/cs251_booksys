<?php

date_default_timezone_set('Asia/Bangkok');

ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

session_start();


if(!isset($_REQUEST['selectedseatid'])){
  header("location:index.php");

}

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
    die("Connect failed: " . $conn->connect_error);

}

//for split string with | (pipe)
$result = explode('|', $_REQUEST['selectedseatid']);

# seat that student click
$selectedSeatid = $result[0];

# time at student clicked range 0 - 6
$selectedSelectedTime = $result[1];

// var_dump($_REQUEST);

$queryConfirmSeat =
"
SELECT seat.stuid_attime$selectedSelectedTime , seat.status$selectedSelectedTime
FROM seat
WHERE seatid = $selectedSeatid;
";

  try {
    $result = $conn->query($queryConfirmSeat);
    // $countFromResult = mysqli_num_rows($result);

    #if query succeed
    if($result){
      $result = mysqli_fetch_assoc($result);
      // var_dump($result);
      if($result["stuid_attime$selectedSelectedTime"] === $_SESSION['sid']){
        // print "this is your seat";

        $queryConfirmSeat =
        "
        UPDATE seat
        SET seat.status$selectedSelectedTime = 2
        WHERE seat.seatid = $selectedSeatid;
        ";

        $result = $conn->query($queryConfirmSeat);

        if($result){
          print "Confirmed succeed";
        }else{
          print "Confirmed failed ";
        }

      }else{
        #this is not your seat
        print "KY";

        // var_dump($_SESSION);
      }

    }else{
      print "This is not your seat " . "<a href='confirm-form.php'>click here to go back</a>";

    }
  }
  catch (Exception $ex) {
    print "Failed [Exception] -> $ex " . ", <a href='booking-form.php'>click here to go back</a><br>";
    $conn->close();
    return ;
  }

$conn->close();

// print $queryConfirmSeat;

?>
