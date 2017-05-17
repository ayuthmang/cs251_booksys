<?php
	//SELECT TIMEDIFF(NOW(), UTC_TIMESTAMP);
	//SELECT NOW()
	date_default_timezone_set('Asia/Bangkok');

	ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

	session_start();


	# if student logged in
    if(isset($_SESSION['sid'])){ //this is an administrator so donothing @_@
      header("location:index.php");
      return ;
    }

    # if not found variable 'uid' store from session
    if(isset($_SESSION['uid']) === false){
      header("location:login.php");
    }

   	$command = $_REQUEST['command'];
	
	$servername = "localhost";
    $username = "root"; // database id
    $password = ""; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return ;
    }
	switch ($command) {

		# Reset all seat
		case 'resetAllSeat':

            $sqlCommand = 
            "
            UPDATE seat
			SET
			  stuid_attime0 = NULL,
			  stuid_attime1 = NULL,
			  stuid_attime2 = NULL,
			  stuid_attime3 = NULL,
			  stuid_attime4 = NULL,
			  stuid_attime5 = NULL,
			  stuid_attime6 = NULL,

			  status0       = 0,
			  status1       = 0,
			  status2       = 0,
			  status3       = 0,
			  status4       = 0,
			  status5       = 0,
			  status6       = 0
			WHERE 1
			";
            
			if($conn->query($sqlCommand)){

				$currentTime = date('Y/m/d - G:i:s');


				$sql_InsertToLog =
		        "
		        INSERT INTO serverlog (message)
		        VALUES ( '[".$currentTime."] Reset all seat successful' );
		        ";


		        $conn->query($sql_InsertToLog);
				print "Reset all seat succeed";
			}else{
				$currentTime = date('Y/m/d - G:i:s');


				$sql_InsertToLog =
		        "
		        INSERT INTO serverlog (message)
		        VALUES ( '[".$currentTime."] Reset all seat failed' );
		        ";


		        $conn->query($sql_InsertToLog);
				print "Reset seat failed " . $conn->connect_error;
			}

			break;


		case 'viewLog':

			// var_dump($_REQUEST);

			$sqlCommand =
			"
			SELECT DISTINCT serverlog.sid , serverlog.message 
			FROM student
			INNER JOIN serverlog ON serverlog.sid = '".$_REQUEST['stuid']."'
			ORDER BY message ASC 
			";

			$result = $conn->query($sqlCommand);

			if(!$result){
				print "Query failed";
				$conn->close();
				return;
			}else{
				echo "<!DOCTYPE html>
						<html>
						<head>
						<style>
						table {
						    font-family: arial, sans-serif;
						    border-collapse: collapse;
						    width: 100%;
						}

						td, th {
						    border: 1px solid #dddddd;
						    text-align: left;
						    padding: 8px;
						}

						tr:nth-child(even) {
						    background-color: #dddddd;
						}
						</style>
						</head>
						<body>";
				echo "<table>";
				echo "<tr>";
				echo "	<th>StudentID</th>";
				echo "	<th>Message Log</th>";
				echo "</tr>";

				while($row = $result->fetch_assoc()){
					echo "<tr><td>".$row['sid']."</td>";
					echo "<td>".$row['message']."</td></tr>";
				}
				echo "	</body>
					</html>";
				echo "</table>";
				
			}
			break;
		default:

			$conn->close();
			print "Command not found.";
			break;
	}


?>