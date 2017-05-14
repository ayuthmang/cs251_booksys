<?php
/**
 * Created by PhpStorm.
 * User: bayu
 * Date: 4/11/2017 AD
 * Time: 10:23 PM
 */

//    $code = "INSERT INTO `seat`(`seatid`, `sid`, `max_seat`, `status`) VALUES ([seatid],[studentid],[max_seat],[status]) ";
/*
 *
 * INSERT INTO admin (uid, fname, lname, password)
VALUES ('view',"ณัฐรุจา","บูรณ์เจริญ" ,'123456789');


INSERT INTO admin (uid, fname, lname, password)
VALUES ('joe',"ยพงศกร","พรมมา" ,'123456789');


INSERT INTO admin (uid, fname, lname, password)
VALUES ('nut', "ยณัฐพล", "พงษ์อุดม" ,'123456789');
 */
    $servername = "localhost";
    $username = "root"; // database id
    $password = ""; // database password
    $dbname = "blacksource_bksys"; //database name
    $conn = new mysqli($servername,$username,$password,$dbname);
    mysqli_set_charset($conn, "utf8");

    header('Content-Type: text/html; charset=utf-8');
    /*
     * //SQL Insert into student table
     INSERT INTO student (sid, fname, lname, priority, password)
                    VALUES (sid, fname, lname, priority, password);

     */
    $myfile = fopen("58-allStudentsName.csv","r") or die("Unable to open file!");
//    echo fread($myfile,filesize("58-allStudentsName.csv"));
    while(!feof($myfile)) {

        $arrStr = explode(',' , fgets($myfile));

//        echo $arrStr[0] . "<br>";

        //http://stackoverflow.com/questions/3384058/how-do-you-strip-whitespace-from-an-array-using-php
        $firstNameAndLastName = explode(' ', $arrStr[1]);
        $array = array_filter(array_map('trim', $firstNameAndLastName));

        $studentID = $arrStr[0];
        $firstName = $array[0];
        $lastName = $array[1];



        print $studentID . "<br>";

        if(isset($firstName) && isset($lastName)){

            $SQLCode =
             "INSERT INTO student (sid, fname, lname, priority, password)
              VALUES ('".$studentID."','".$firstName."' , '".$lastName."',0,'123456');";
//            $conn->query($SQLCode);
        }
//        print_r ($array);
//        $firstName2 = trim($firstNameAndLastName[0], ' ');
//        $lastName2 =  trim($firstNameAndLastName[1], ' ');

//        var_dump($array);
//        var_dump($firstNameAndLastName);
//        $array = array(' foo ', 'bar ', ' baz', '    ', '', 'foo bar');

//        var_dump($firstNameAndLastName);
//        $SQLCode = "INSERT INTO student (sid, fname, lname, priority, password)
//                    VALUES ('".$studentID."', '".$firstName."', '".$lastName."', 0, '123456');";
//


    }

    fclose($myfile);

    $conn->close();
//    $pollids  = "58-allStudentsName.csv";
//    $contents = file_get_contents($pollids);
//    $pollfields = explode(',', $contents);

//    echo $pollfields[0]; // Prints the value in first "cell"
//    echo $pollfields[1]; // The second
//    echo $pollfields[2]; // The second

    
// Insert all seat 1 to 32
//    for( $i = 1; $i <= 32; $i++){
//        $code = "INSERT INTO `seat` (`seatid`, `sid`, `status`) VALUES ('".$i."','',0) ";
//        $conn->query($code);
//
//    }

