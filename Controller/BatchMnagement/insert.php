
<?php

//insert.php
include '../../model/Connection.php';
$class = $_POST["SelectClass"];
$batch = $_POST["SelectBatch"];
$teacher = $_POST["SelectTeacher"];


$sql = "INSERT INTO `tbl_batch`(`Class_ID`, `Batch_Number`, `Teacher_ID`) VALUES ('$class','$batch','$teacher')";


runQuary($sql, "New record Added Successfully !!!");


?>

