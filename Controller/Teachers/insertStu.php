
<?php

//insert.php
include '../../model/Connection.php';
$ID = $_POST["ID"];
$Name = $_POST["Name"];
$Address = $_POST["Address"];
$Phone = $_POST["Phone"];
$Mail = $_POST["Email"];
$Subject = $_POST["Subject"];
$Date = $_POST["datepicker"];
$Gender = $_POST["Gender"];
$year = date("Y-m-d");


$sql = "INSERT INTO `tbl_teachers`(`Teacher_ID`, `Teacher_Name`, `Teacher_Address`, `Teacher_Phone`, `Teachert_Email`, `BOD`, `Gender`, `Joined_Year`, `Subject_ID`, `Status`) VALUES ('$ID','$Name','$Address','$Phone','$Mail','$Date','$Gender','$year','$Subject','Active')";

runQuary($sql, "New record Added Successfully !!!");
