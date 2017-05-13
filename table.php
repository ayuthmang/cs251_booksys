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
                    echo "<td>" . $row['sid'] . "</td>";
                    $status = "Unknown";
                    // echo "The time is " . date("h:i:sa");
                    switch ($row['status']) {
                        case 0: //avaliable
                            $status = "Avaliable";

                            //print 7 buttons
                            /*
                            8.00 - 9.30 : 0

                            9.30 - 11.00 : 1

                            11.00 - 12.30 : 2

                            12.30 - 13.00 // break time

                            13.30 - 15.00 : 3

                            15.00 - 16.30 : 4

                            16.30 - 18.00 : 5

                            18.00 - 19.30 :6
                            */
                            for ($i=0; $i <7 ; $i++) {
                              # print 7 buttons for different TIME
                              echo "<td>";
                              echo "<button type='submit' class='btn btn-success' name='selectedseatid' value='" . $row['seatid'] .  "|".$i."'>
                                      Reservation
                                    </button>
                              ";
                              echo '</td>';
                            }

                            echo "</tr>";
                            break;
                        case 1: //waiting for confirmation
                            $status = "Waiting for confirmation";
                            // echo "<td class='alert-warning'>$status</td>";
                            echo "<td>";

//                            var_dump($row);
                            if (isset($_SESSION['sid'])) {
                                if ($_SESSION['sid'] === $row['sid']) {


                                    echo "<button type='submit' class='btn btn-danger' name='selectedseatid' value='" . $row['seatid'] . "'>
                                            Revoke Seat
                                          </button>
                                          ";
                                }
                            }
                            echo "</td>";
                            echo "</tr>";
                            break;
                        case 2: //confirmed
                            $status = "Not Avaliable";
                            // echo "<td class='validation_error'>$status</td>";

                            echo "<td>";

                            if ($_SESSION['sid'] === $row['sid']) {
                                echo "<button type='submit' class='btn btn-danger' name='selectedseatid' value='" . $row['seatid'] . "'>
                                        Revoke Seat
                                      </button>
                                     ";
                            }
                            echo "</td>";
                            echo "</tr>";

                            break;
                    }
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
