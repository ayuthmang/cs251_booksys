
<?php

//for change password

ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();

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

$oldPass = $_REQUEST["oldPass"];
$newPass = $_REQUEST["newPass"];
$newPassConfirm = $_REQUEST["newPassConfirm"];

if($newPass === $newPassConfirm){

    # this is a student
    if(isset($_SESSION['sid'])){
        //if is student
        $sqlCode =
            "
        SELECT sid,password
        FROM student
        WHERE sid = '".$_SESSION['sid']."' and password = '".$oldPass."'
        ";
//        print $sqlCode;
        $objResult = mysqli_fetch_array($conn->query($sqlCode));

            if($objResult){ // got some column and password is true
                $sqlCodeForChangePassword =
                   "UPDATE student
                    SET student.password = '".$newPass."'
                    WHERE student.sid = '".$_SESSION['sid']."' and password ='".$oldPass."';
                   ";

                $result = $conn->query($sqlCodeForChangePassword);

                if($conn->affected_rows === 1){
                    print "Changed password success.";
                }
                else{ //old password not match from database
                    print "Change password failed"; 
                }

            }
//        print_r( $objResult);
    }

    # this is an administrator
    elseif (isset($_SESSION['uid'])) {
        $sqlCode =
        "
        SELECT uid,password
        FROM admin
        WHERE uid = '".$_SESSION['uid']."' and password = '".$oldPass."'
        ";

        $objResult = mysqli_fetch_array($conn->query($sqlCode));


        //if match username and oldpass id in database
        if($objResult){
            $sqlCodeForChangePassword =
               "UPDATE admin
                SET admin.password = '".$newPass."'
                WHERE admin.uid = '".$_SESSION['uid']."' and password ='".$oldPass."';
               ";
            $result = $conn->query($sqlCodeForChangePassword);

            if($conn->affected_rows === 1){
                print "Changed password success.";
            }
            else{ //old password not match from database
                print "Change password failed";
            }
        }else{
            print "Your old password not match in database";
        }



    }

}else{
    echo "New password and Confirm password not match";
}
$conn->close();