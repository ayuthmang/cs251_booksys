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

          $hour = $this->getHour();
          $minute = $this->getMinute();
  	}


    public function getHour()
    {
        $time = date('G');
        return $time;
    }

    public function getMinute()
    {
        $time = date('i');
        return $time;
    }

    public function getSeccond()
    {
        $time = date('s');
        return $time;

    }

    public function printTable()
    {
        if (!$this->isTimeOut()) { //time is greather than 20.00 pm
            $this->printOutOfServiceTable();
            return;
        } else {
            $mySqlCommand = "SELECT * FROM seat";
            $servername = "188.166.248.254";
            $username = "blacksource_root"; // database id
            $password = "ifyounot"; // database password
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
                        sid_time0 --> for recorded student who get this seat.
                        status0  --> for status
                                      0 -- avalible
                                        # Print button 'Reserve'
                                      1 -- wait for confirmation
                                        # Print text 'Wait for $studentid confirmed'
                                      2 -- confirmed
                                        # Print text 'This set not avalible right now please try again'
                      ---------------------
                        sid_time1 -->
                        status2  -->
                      ---------------------

                    */

                    for ($i=0; $i <7 ; $i++) {

                      // //for catch the studentid from seat 0 to 6
                      // switch ("sid_time$i") {
                      //   case 0:
                      //
                      //     break;
                      //
                      //   case 1:
                      //
                      //     break;
                      //
                      //   case 2:
                      //
                      //     break;
                      //
                      // }

                      //for catch the status from seat 0 to 6
                      switch ($row["status$i"]) {
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
                          $studentidFromDB = $row["sid_time$i"];
                          $status = sprintf("Waiting %s Confirm", $studentidFromDB);
                          print $status;
                          echo "<td class='alert-warning' align='center'>$status</td>";

                        // 0 -- avalible
                        //   # Print button 'Reserve'
                        // 1 -- wait for confirmation
                        //   # Print text 'Wait for $studentid confirmed'
                        // 2 -- confirmed
                        //   # Print text 'This set not avalible right now please try again'
                          break;

                        case 2:
                          $studentidFromDB = $row["sid_time$i"];
                          $status = sprintf("%s Confirmed", $studentidFromDB);


                          echo "<td class='success' align='center'>$status</td>";

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
        if ($this->getHour() >= 20 || ($this->getHour() >= 0 && $this->getHour() < 8)) {
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
            echo "<td class='table-striped'></td>";
            for ($col = 1; $col <= 7; $col++) {

                echo "<td class='validation_error'>TIME OUT</td>";
            }
            echo "</tr>";
        }
    }


} //end clasee
?>
