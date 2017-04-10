<?php

session_save_path("/tmp");
session_start();

$servername = "localhost";
$username = "root"; // database id
$password = ""; // database password
$dbname = "mydb"; //database name
$conn = new mysqli($servername,$username,$password,$dbname);
//    print_r($_REQUEST);
if($conn->connect_error){
//        print $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
}

//$id = $_REQUEST['cid'];
//$pass = $_REQUEST['cpass'];
$name = $_REQUEST['cname'];
$lastname = $_REQUEST['clastname'];
//$gender = $_REQUEST['cgender'];
$mail = $_REQUEST['cmail'];
$address = $_REQUEST['caddress'];

$telephone = $_REQUEST['cphone'];



$sqlUpdateAccInfo = "UPDATE `accinfo` SET `C_NAME`='".$name."', `C_LASTNAME`='".$lastname."',`C_PHONE`='".$telephone."',`C_MAIL`='".$mail."',`C_ADDRESS`='".$address."'
                    WHERE C_ID= '".$_SESSION['C_ID']."' ";

if($conn->query($sqlUpdateAccInfo) === true){
    print "Updated Successful";
}else{
    print "Error ".$conn->error;

}



//UPDATE `accounts` SET `C_PASSWORD`='5555555' WHERE `C_ID`='admin'
//UPDATE `accinfo` SET `C_ID`=[value-1],`C_NAME`=[value-2],`C_LASTNAME`=[value-3],`C_GENDER`=[value-4],`C_PHONE`=[value-5],`C_MAIL`=[value-6],`C_ADDRESS`=[value-7]
//                  WHERE 1
$conn->close();