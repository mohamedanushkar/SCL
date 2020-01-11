
<?php

//insert.php
include '../../model/Connection.php';
$ID = $_POST["ID"];
$Name = $_POST["Name"];
$Address = $_POST["Address"];
$Phone = $_POST["Phone"];
$Mail = $_POST["Email"];
$Grade = $_POST["Grade"];
$Date = $_POST["Date"];

$year = date("Y");


if ($Grade != '') {

    $sql = "INSERT INTO `Student`(`id`, `Student_Name`, `Student_Address`, `Student_Phone`, `Student_Email`,`Grade_ID`,`Year`,`JoinedDate`)VALUES('$ID','$Name','$Address','$Phone','$Mail','$Grade','$year','$Date')";

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
