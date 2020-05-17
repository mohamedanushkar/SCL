<?php
//insert.php
include './../../model/Connection.php';
$ID = $_POST["ID"];
$Grade = $_POST["Grade"];


$sql = "INSERT INTO `tbl_batch_students`(`Batch_ID`, `Student_ID`) VALUES ('$Grade','$ID')";




runQuary($sql, "Student Added To Batch !!!");

