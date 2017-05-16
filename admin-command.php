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
	
	switch ($command) {

		# Reset all seat
		case 'resetAllSeat':
			$servername = "localhost";
            $username = "root"; // database id
            $password = ""; // database password
            $dbname = "blacksource_bksys"; //database name
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                return ;
            }
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
		
		default:


			print "Command not found.";
			break;
	}

	$conn->close();
?>