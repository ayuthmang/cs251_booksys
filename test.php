<?php
// echo "Today is " . date("Y/m/d") . "<br>";
// echo "Today is " . date("Y.m.d") . "<br>";
// echo "Today is " . date("Y-m-d") . "<br>";
// echo "Today is " . date("l");



// set default timezone
// date_default_timezone_set('Asia/Bangkok'); // CDT

// $current_date = date('d/m/Y == H:i:s');

// echo $current_date;




date_default_timezone_set('Asia/Bangkok');
$current_time = date('H:i:s');
echo $current_time;
?>