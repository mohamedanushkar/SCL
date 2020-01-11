<?php

//insert.php
$connect = mysqli_connect("localhost", "root", "", "finalsystemdb");

$Teachers_ID = $_POST["Teachers_ID"];
$Status = $_POST["Status"];
$date = date("Y-m-d");
$time = date("h:i:sa");


$query = '';
for ($count = 0; $count < count($Teachers_ID); $count++) {
    $Teachers_ID_Clean = mysqli_real_escape_string($connect, $Teachers_ID[$count]);
    $Status_clean = mysqli_real_escape_string($connect, $Status[$count]);

    if ($Teachers_ID_Clean != '' && $Status_clean != '') {
        $query .= '
   INSERT INTO teachersattendence( `Teachers_ID`, `Date`, `Time`, `Status`) 
   VALUES("' . $Teachers_ID_Clean . '","' . $date . '", "' . $time . '", "' . $Status_clean . '"); 
   ';
    }
}
if ($query != '') {
    if (mysqli_multi_query($connect, $query)) {
        echo '<p style="background-color: #EBF8A4; border-left: 5px solid red; padding: 10px; border-radius: 10px; font-family:  sans-serif">
   Date Inserted
    </p>';
    } else {
        echo '<p style="background-color: #F8C740; border-left: 5px solid red; padding: 10px; border-radius: 10px; font-family:  sans-serif">
   Error
    </p>';
    }
} else {
    echo '<p style="background-color: #F8C740; border-left: 5px solid red; padding: 10px; border-radius: 10px; font-family:  sans-serif">
   All Fields Are Reqiured
    </p>';
}
?>
