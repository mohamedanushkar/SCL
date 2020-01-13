
<?php

//insert.php
include '../../model/Connection.php';
$ID = $_POST["ID"];
$Name = $_POST["Name"];
$Address = $_POST["Address"];
$Phone = $_POST["Phone"];
$Mail = $_POST["Email"];
$Subject = $_POST["Subject"];
$Date = $_POST["Date"];
$Gender = $_POST["Gender"];
$year = date("Y-m-d");


if ($ID != '') {

    $sql = "INSERT INTO `tbl_teachers`(`Teacher_ID`, `Teacher_Name`, `Teacher_Address`, `Teacher_Phone`, `Teachert_Email`, `Present_Year`, `Gender`, `Joined_Year`, `Subject_ID`, `Status`) VALUES ('$ID','$Name','$Address','$Phone','$Mail','$Date','$Gender','$year','$Subject','Active')";

    $conn->query($sql);

    
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Date Entered Successfully');";
    echo "</script>";
} else {

    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('all fields are required');";
    echo "</script>";
}
