<?php
    $servername = "188.166.248.254";
    $username = "blacksource_root"; // database id
    $password = "ifyounot"; // database password
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


    $insertToAccount = "INSERT INTO `student`(`sid`, `fname`, `lname`, `priority`, `password`)
                         VALUES ('".$id."', '".$fname."', '".$lname."' , 0 , '".$password."')";

    print $insertToAccount;
    if($conn->query($insertToAccount) === true){
        print "Registration success";
    }
    else{
        print "Registration failed";

    }

    $conn->close();
