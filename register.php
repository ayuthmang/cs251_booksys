<?php
    $servername = "localhost";
    $username = "root"; // database id
    $password = ""; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername,$username,$password,$dbname);
//    print_r($_REQUEST);
if($conn->connect_error){
//    print $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
}

    $id = $_REQUEST['sid'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $password = $_REQUEST['password'];


    $checkIfExists = "SELECT 1 FROM student WHERE sid = '".$_REQUEST['sid']."' ";

    $result = $conn->query($checkIfExists);

    print mysqli_num_rows($result);

//    print $result['sid'];

    var_dump($result);
    print "<br>";
    print_r ($result);


//    $insertToAccount = "INSERT INTO `student`(`sid`, `fname`, `lname`, `priority`, `password`)
//                         VALUES ('".$id."', '".$fname."', '".$lname."' , 0 , '".$password."')";
//
//    print $insertToAccount;
//    if($conn->query($insertToAccount) === true){
//        print "Registration success";
//    }
//    else{
//        print "Registration failed";
//
//    }
//
//    $conn->close();
