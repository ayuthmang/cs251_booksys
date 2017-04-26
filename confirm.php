<?php

print_r ($_REQUEST);

foreach ($_GET as $name => $value) {
    echo $name . ' : ' . $value . '<br />';
}
//echo "<table>";
//
//    foreach ($_POST as $key => $value) {	
//        echo "<tr>";
//        echo "<td>";
//        echo $key;
//        echo "</td>";
//        echo "<td>";
//        echo $value;
//        echo "</td>";
//        echo "</tr>";
//    }
//
//echo "</table>";