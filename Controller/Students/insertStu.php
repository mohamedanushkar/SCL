
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
$Gender = $_POST["Gender"];
$year = date("Y-m-d");


if ($Grade != '') {

    $sql = "INSERT INTO `tbl_student`(`Student_ID`, `Student_Name`, `Student_Address`, `Student_Phone`, `Student_Email`, `Present_Year`, `Gender`, `tbl_Class_ID`, `Joined_Year`, `Status`) VALUES ('$ID','$Name','$Address','$Phone','$Mail','$year','$Gender','$Grade',$year,'Active')";

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
