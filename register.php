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

    $id = $_REQUEST['cid'];

    $sid = NULL;
    $fname = NULL;
    $lname = NULL;
    $priority = NULL;
    $password = NULL;

    $insertToAccount = "INSERT INTO `student`(`sid`, `fname`, `lname`, `priority`, `password`)
                         VALUES ([studentID],[firstName],[lastName],[priority],[password])"

    if($conn->query($insertToAccount) === true){
        print "Insert to account table successful";
    }
    else{
        print "Insert to account table failed";

    }


    print "<br>";
    if($conn->query($insertToAccInfo) === true){
        print "Insert to accountinfo table successful";
    }
    else{
        print "Insert to accountinfo table failed";

    }
    $conn->close();
