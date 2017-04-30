<?php
/**
 * Created by PhpStorm.
 * User: bayu
 * Date: 4/11/2017 AD
 * Time: 10:23 PM
 */

//    $code = "INSERT INTO `seat`(`seatid`, `sid`, `max_seat`, `status`) VALUES ([seatid],[studentid],[max_seat],[status]) ";

    $myfile = fopen("58-allStudentsName.csv","r") or die("Unable to open file!");
    echo fread($myfile,filesize("58-allStudentsName.csv"));
    while(!feof($myfile)) {
        echo fgets($myfile) . "<br>";
    }
    fclose($myfile);
        $servername = "188.166.248.254";
    $username = "blacksource_root"; // database id
    $password = "ifyounot"; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername,$username,$password,$dbname);

// Insert all seat 1 to 32
//    for( $i = 1; $i <= 32; $i++){
//        $code = "INSERT INTO `seat` (`seatid`, `sid`, `status`) VALUES ('".$i."','',0) ";
//        $conn->query($code);
//
//    }

