<?php

//insert.php
$connect = mysqli_connect("localhost", "root", "", "finalsystemdb");

$Grade_ID = $_POST["Grade_ID"];
$Student_ID = $_POST["Student_ID"];
$Status = $_POST["Status"];
$date = date("Y-m-d");
$time = date("h:i:sa");


$query = '';
for ($count = 0; $count < count($Student_ID); $count++) {
    $Student_ID_clean = mysqli_real_escape_string($connect, $Student_ID[$count]);
    $Status_clean = mysqli_real_escape_string($connect, $Status[$count]);

    if ($Student_ID_clean != '' && $Status_clean != '') {
        $query .= '
   INSERT INTO StuAttendence(Student_id, Grade_ID ,Date, Time, Status) 
   VALUES("' . $Student_ID_clean . '","'.$Grade_ID.'" ,"' . $date . '", "' . $time . '", "' . $Status_clean . '"); 
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
