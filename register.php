<?php
    $servername = "localhost";
$username = "root"; // database id
$password = ""; // database password
$dbname = "mydb"; //database name
$conn = new mysqli($servername,$username,$password,$dbname);
//    print_r($_REQUEST);
if($conn->connect_error){
//    print $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
}

    $id = $_REQUEST['cid'];
    $pass = $_REQUEST['cpass'];
    $name = $_REQUEST['cname'];
    $lastname = $_REQUEST['clastname'];
    $gender = $_REQUEST['cgender'];
    $mail = $_REQUEST['cmail'];
    $address = $_REQUEST['caddress'];

    $telephone = $_REQUEST['cphone'];

    $insertToAccount = "INSERT INTO `accounts`(`C_ID`, `C_PASSWORD`, `C_TYPE`) 
                                          VALUES ('".$id."','".$pass."','1')";


    $insertToAccInfo = "INSERT INTO `accinfo`(`C_ID`, `C_NAME`, `C_LASTNAME`, `C_GENDER`, `C_PHONE`, `C_MAIL`, `C_ADDRESS`)
                                     VALUES ('".$id."' , '".$name."','".$lastname."','".$gender."','".$telephone."','".$mail."','".$address."') ";


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
