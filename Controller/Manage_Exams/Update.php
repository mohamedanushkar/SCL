<?php

include '../../model/Connection.php';
$id = $_POST["id"];
$Grade_ID = $_POST["Grade_ID"];
$Exam_Name_ID = $_POST["Exam_Name_ID"];
$Subject_ID = $_POST["Subject_ID"];
$Exam_Time = $_POST["Exam_Time"];
$Date = $_POST["Date"];

$sql = "UPDATE `exam` SET `Grade_ID`= '$Grade_ID',`Subject_ID`= '$Subject_ID',`Exam_Name_ID`='$Exam_Name_ID',`Exam_Time`='$Exam_Time',`Date`= '$Date' WHERE `ExamID`= '$id'";

$conn->query($sql);
echo "<script language='javascript' type='text/javascript'>";
echo "alert('Data Updated Successfully');";
echo "</script>";
?>