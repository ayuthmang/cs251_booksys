<?php

	ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

    session_start();
    // $queryCheckIfStudentInCurrentSeat = "
    //                   SELECT seat.seatid , seat.sid
    //                   FROM seat
    //                   WHERE seat.sid = '".$_SESSION['sid']."' ";
	print_r ($_REQUEST);

    $servername = "188.166.248.254";
    $username = "blacksource_root"; // database id
    $password = "ifyounot"; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

    }


$selectedSeatId = $_REQUEST['selectedseatid'];



	$sql_CheckIfSeatIsOwnAndConfirmedByCurrentStudentId = 
	"
	SELECT seat.sid
	FROM seat
	WHERE seat.sid = '".$_SESSION['sid']."' and seat.status=2
	";

	$objResult = $conn->query($sql_CheckIfSeatIsOwnAndConfirmedByCurrentStudentId);
	$data = $objResult->fetch_assoc();


	if(isset($data) && $data['sid'] === $_SESSION['sid']){
		// Seat is own my me an confirmed 
		// So we gonna remove this seat

		print "I'm here";
		$sql_RemoveCurrentSeatFromDTB = 
		"
		UPDATE seat
		SET seat.sid = NULL , seat.status = 0 
		WHERE seat.seatid = $selectedSeatId and seat.sid = '".$_SESSION['sid']."'
		";

		$queryResult = $conn->query($sql_RemoveCurrentSeatFromDTB);


		// var_dump($queryResult);

	}
	else{
		// Seat that available
		// So we gonna reserve this seat

		$sqlConfirmSeat = 
		"
		UPDATE seat
		SET seat.status = 2
		WHERE seat.seatid = $selectedSeatId and seat.sid = '".$_SESSION['sid']."'
		";

		$queryResult = $conn->query($sqlConfirmSeat);
		if($queryResult)
			print "Reserved seat $selectedSeatId successful" ;
		else
			print "Reserve seat $selectedSeatId failed";
		// var_dump($queryResult);

	}





?>