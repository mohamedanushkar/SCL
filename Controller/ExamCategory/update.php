<?php

include '../../model/Connection.php';

$ID = $_POST["id"];
$Exam_Name = $_POST["Exam_Name"];



$sql = "UPDATE `finalsystemdb`.`Exam_Name` SET Exam_Name= '$Exam_Name'   WHERE Exam_Name_ID = '$ID'";
$conn->query($sql);
echo "<script language='javascript' type='text/javascript'>";
echo "alert('Record Updated Successfully');";
echo "</script>";
?>