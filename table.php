<?php

class Table{


	function __construct() {
       // print "In BaseClass constructor\n";
	}


	public function getHour(){
		$time = date('G');
		return $time;
	}	

	public function getMinute(){
		$time = date('i');
		return $time;
	}

	public function getSeccond(){
		$time = date('s');
		return $time;

	}


	public function printTable(){

                            $current_time_Hour = date('G');

                            $mytable = new table();

                            if($mytable){
                                // print "Table is not empty";

                                $hour = $mytable->getHour();
                                printf("%s:%s:%s",$mytable->getHour(),$mytable->getMinute(),$mytable->getSeccond());

                            }
                            // if($current_time_Hour >= 20){
                            //     print "Is late than 20.00";
                            // }


                            // print $current_time_Hour;

                            // $current_time_Minute = data


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
                                            // echo "<td class='alert-success'>$status</td>";
                                            echo "<td>";
                                            echo "<button type='submit' class='btn btn-success' name='selectedseatid' value='".$row['seatid']."'>
                                                    Reservation
                                                  </button>
                                                  "; 
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<button type='submit' class='btn btn-success' name='selectedseatid' value='".$row['seatid']."'>
                                                    Reservation
                                                  </button>
                                                  "; 
                                            echo "</td>";

                                            echo "<td>";
                                            echo "<button type='submit' class='btn btn-success' name='selectedseatid' value='".$row['seatid']."'>
                                                    Reservation
                                                  </button>
                                                  "; 
                                            echo "</td>";

                                            echo "<td>";
                                            echo "<button type='submit' class='btn btn-success' name='selectedseatid' value='".$row['seatid']."'>
                                                    Reservation
                                                  </button>
                                                  "; 
                                            echo "</td>";

                                            echo "<td>";
                                            echo "<button type='submit' class='btn btn-success' name='selectedseatid' value='".$row['seatid']."'>
                                                    Reservation
                                                  </button>
                                                  "; 
                                            echo "</td>";

                                            echo "<td>";
                                            echo "<button type='submit' class='btn btn-success' name='selectedseatid' value='".$row['seatid']."'>
                                                    Reservation
                                                  </button>
                                                  "; 
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<button type='submit' class='btn btn-success' name='selectedseatid' value='".$row['seatid']."'>
                                                    Reservation
                                                  </button>
                                                  "; 
                                            echo "</td>";
                                            echo "</tr>";
                                            break;
                                        case 1: //waiting for confirmation
                                            $status = "Waiting for confirmation";
                                            // echo "<td class='alert-warning'>$status</td>";


                                            echo "<td>";
                                            

                                            if(isset($_SESSION['sid'])){
                                                if($_SESSION['sid'] === $row['sid']){
    //                                                var_dump($row);
    //                                                var_dump($_SESSION);
                                                    echo "<button type='submit' class='btn btn-danger' name='selectedseatid' value='".$row['seatid']."'>
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


                                            if($_SESSION['sid'] === $row['sid']) {
                                                echo "<button type='submit' class='btn btn-danger' name='selectedseatid' value='".$row['seatid']."'>
                                                        Revoke Seat
                                                      </button>
                                                ";
                                            }

                                            echo "</td>";
                                            echo "</tr>";

                                            break;
                                    }


//                                        echo "<td>$status</td>";

                                }
                                $result->free();
                            }
	}

	
}

?>