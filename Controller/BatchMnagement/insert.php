
<?php

//insert.php
include '../../model/Connection.php';
$class = $_POST["SelectClass"];
$batch = $_POST["SelectBatch"];
$teacher = $_POST["SelectTeacher"];


$sql = "INSERT INTO `tbl_batch`(`Class_ID`, `Batch_Number`, `Teacher_ID`, `status`) VALUES ('$class','$batch','$teacher','Open')";


runQuary($sql, "New record Added Successfully !!!");


?>

