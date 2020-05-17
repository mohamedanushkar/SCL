<?php

//insert.php
$connect = mysqli_connect("localhost", "root", "", "finalsystemdb");


$Student_ID = $_POST["Student_ID"];
$Status = $_POST["Status"];
$date = date("Y-m-d");



$query = '';
for ($count = 0; $count < count($Student_ID); $count++) {
    $Student_ID_clean = mysqli_real_escape_string($connect, $Student_ID[$count]);
    $Status_clean = mysqli_real_escape_string($connect, $Status[$count]);

    if ($Student_ID_clean != '' && $Status_clean != '') {
        $query .= '
   INSERT INTO tbl_Attendence(Student_ID, Date ,Status) 
   VALUES("' . $Student_ID_clean . '","'.$date.'" ,"' . $Status_clean . '"); 
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
