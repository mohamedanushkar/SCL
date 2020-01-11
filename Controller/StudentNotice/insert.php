<?php

include '../../model/Connection.php';
$id = $_POST["StuID"];
$Title = $_POST["NoticeTitle"];
$Dis= $_POST["Description"];
$date = date("Y-m-d");
$time = date("h:i:sa");






if ($id != '') {

    $sql = "INSERT INTO `Notice`( Student_id, Heading, Discription, Time, Date)VALUES('$id','$Title','$Dis','$time','$date')";

    $conn->query($sql);

   
    
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Date Entered Successfully');";
    echo "</script>";
} else {

    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('all fields are required');";
    echo "</script>";
}
?>

