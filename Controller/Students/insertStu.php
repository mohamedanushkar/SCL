
<?php

//insert.php
include './../../model/Connection.php';
$ID = $_POST["ID"];
$Name = $_POST["Name"];
$Address = $_POST["Address"];
$Phone = $_POST["Phone"];
$Mail = $_POST["Email"];
$Grade = $_POST["Grade"];
$Date = $_POST["datepicker"];
$Gender = $_POST["Gender"];
$year = date("Y-m-d");
$password = $_POST["Password"];

$sql = "INSERT INTO `tbl_student`(`Student_ID`, `Student_Name`, `Student_Address`, `Student_Phone`, `Student_Email`, `Gender`, `Joined_Year`, `Status`, `BOD` , `password`)  VALUES ('$ID','$Name','$Address','$Phone','$Mail','$Gender','$year','Active','$Date','$password');";




runQuary($sql, "New record Added Successfully !!!");




