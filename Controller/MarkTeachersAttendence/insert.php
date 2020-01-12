<?php

//insert.php
$connect = mysqli_connect("localhost", "root", "", "finalsystemdb");


$Teacher_ID = $_POST["Teacher_ID"];
$Status = $_POST["Status"];
$date = date("Y-m-d");



$query = '';
for ($count = 0; $count < count($Teacher_ID); $count++) {
    $Teacher_ID_clean = mysqli_real_escape_string($connect, $Teacher_ID[$count]);
    $Status_clean = mysqli_real_escape_string($connect, $Status[$count]);

    if ($Teacher_ID_clean != '' && $Status_clean != '') {
        $query .= '
   INSERT INTO tbl_Attendence_Teachers(Teacher_ID, Date ,Status) 
   VALUES("' . $Teacher_ID_clean . '","'.$date.'" ,"' . $Status_clean . '"); 
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
