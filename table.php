<?php

class Table
{
      function __construct()
      {
          // print "In BaseClass constructor\n";


          //Every new object table will check if in time then query remove all seat
          /*
            8.00 - 9.30 : 8

            9.30 - 11.00 : 9

            11.00 - 12.30 : 11

            12.30 - 13.00 // break time

            13.30 - 15.00 :13

            15.00 - 16.30 :15

            16.30 - 18.00 : 16

            18.00 - 19.30 :18
          */
  	}


    public static function getHour()
    {
        $time = date('G');
        return $time;
    }

    public static function getMinute()
    {
        $time = date('i');
        return $time;
    }

    public static function getSeccond()
    {
        $time = date('s');
        return $time;

    }

    public function printTableBookingPage()
    {
        if ($this->isTimeOut()) { //time is greather than 20.00 pm
            $this->printOutOfServiceTable();
            return;
        } else {
            $mySqlCommand = "SELECT * FROM seat";
            $servername = "localhost";
            $username = "root"; // database id
            $password = ""; // database password
            $dbname = "blacksource_bksys"; //database name
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);

            }
            $query = "SELECT * FROM seat";

            if ($result = $conn->query($query)) {

                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";
                    echo "<td>" . $row['seatid'] . "</td>";

                    /*
                      We have 7 columns to add to table
                      In real database is:
                      ---------------------
                        stuid_attime0 --> for recorded student who get this seat.
                        status0  --> for status
                                      0 -- avalible
                                        # Print button 'Reserve'
                                      1 -- wait for confirmation
                                        # Print text 'Wait for $studentid confirmed'
                                      2 -- confirmed
                                        # Print text 'This set not avalible right now please try again'
                      ---------------------
                        stuid_attime1 -->
                        status2  -->
                      ---------------------

                    */

                    for ($i=0; $i <7 ; $i++) {

                      //for catch the status from seat 0 to 6
                      switch ($row["status$i"]) {

                        case -1:

                          echo "<td class='validation_error text-center'>TIME OUT</td>";
                          break;

                        case 0: # Avalible
                          #if avalible then print 'Reserve' button
                          echo "<td align=''>";
                          echo "<div class='info'>";
                          echo "<button type='submit' class='btn btn-success input-block-level form-control' name='selectedseatid' value='" . $row['seatid'] . "|".$i."'>
                                  Reserve this
                                </button>
                          ";
                          echo "</div>";
                          echo '</td>';
                          break;
                        case 1: # Waiting for confirmation
                        # btn btn-lg btn-link
                          $studentInCurrentSeat = $row["stuid_attime$i"];
                          echo "<td class='warning' align='center'>Waiting $studentInCurrentSeat confirm</td>";
                          break;

                        case 2:
                          $studentidFromDB = $row["stuid_attime$i"];
                          $status = sprintf("%s Confirmed", $studentidFromDB);
                          echo "<td class='alert alert-success' align='center'>$status</td>";

                          break;
                      }
                    }
                    print '</tr>';


                } // end while
          $result->free();
        } //end if
      } //end else
    } // end function printTable

    public function printTableConfirmPage()
    {
        if ($this->isTimeOut()) { //time is greather than 20.00 pm
            $this->printOutOfServiceTable();
            return;
        } else {
            $mySqlCommand = "SELECT * FROM seat";
            $servername = "localhost";
            $username = "root"; // database id
            $password = ""; // database password
            $dbname = "blacksource_bksys"; //database name
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);

            }
            $query = "SELECT * FROM seat";

            if ($result = $conn->query($query)) {

                while ($row = $result->fetch_assoc()) {
                    //for debug
                    //printf ("%s (%s) %s\n <br>", $row["seatid"], $row["sid"] , $row["status"]);
                    echo "<tr>";
                    echo "<td>" . $row['seatid'] . "</td>";

                    /*
                      We have 7 columns to add to table
                      In real database is:
                      ---------------------
                        stuid_attime0 --> for recorded student who get this seat.
                        status0  --> for status
                                      0 -- avalible
                                        # Print button 'Reserve'
                                      1 -- wait for confirmation
                                        # Print text 'Wait for $studentid confirmed'
                                      2 -- confirmed
                                        # Print text 'This set not avalible right now please try again'
                      ---------------------
                        stuid_attime1 -->
                        status2  -->
                      ---------------------

                    */

                    for ($i=0; $i <7 ; $i++) {

                      //for catch the status from seat 0 to 6
                      switch ($row["status$i"]) {

                        case -1:

                          echo "<td class='validation_error text-center'>TIME OUT</td>";
                          break;

                        case 0: # Avalible
                          #if avalible then print 'Reserve' button
                          echo "<td class='alert alert-info' align='center'>Avaliable</td>";

                          // echo "<td align=''>";
                          // echo "<div class='info'>";
                          // echo "<button type='submit' class='btn btn-success input-block-level form-control' name='selectedseatid' value='" . $row['seatid'] . "|".$i."'>
                          //         Reserve this
                          //       </button>
                          // ";
                          // echo "</div>";
                          // echo '</td>';
                          break;

                        case 1: # Waiting for confirmation
                        # btn btn-lg btn-link

                        # Seat is mine
                        if($_SESSION['sid'] === $row["stuid_attime$i"]){
                          echo "<td align=''>";
                          echo "<div class='info' align='center'>";
                          echo "<button type='submit' class='btn btn-lg btn-link' name='selectedseatid' value='" . $row['seatid'] . "|".$i."'>
                                  Confirm seat
                                </button>
                          ";
                          echo "</div>";
                          echo '</td>';
                        }else{
                          $studentInCurrentSeat = $row["stuid_attime$i"];
                          echo "<td class='alert alert-warning' align='center'>Waiting $studentInCurrentSeat confirm</td>";
                        }

                          break;

                        case 2:
                          $studentidFromDB = $row["stuid_attime$i"];
                          $status = sprintf("%s Confirmed", $studentidFromDB);


                          echo "<td class='alert alert-success' align='center'>$status</td>";

                          break;
                      }
                    }
                    print '</tr>';


                } // end while
          $result->free();
        } //end if
      } //end else
    } // end function printTable


    public function isTimeOut()
    {
        $hour = (int) $this->getHour();
        // print gettype($hour);
        if ($hour >= 20 || ($hour >= 0 && $hour < 8)) {
            return true;
        }
        return false;
    }

    public function printOutOfServiceTable()
    {
        for ($row = 1; $row <= 32; $row++) {
            echo "<tr>";
            //seat number
            echo "<td>$row</td>";
            //own by
            for ($col = 1; $col <= 7; $col++) {

                echo "<td class='validation_error'>TIME OUT</td>";
            }
            echo "</tr>";
        }
    }


} //end clasee
?>
