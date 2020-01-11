<?php

include '../../model/Connection.php';

$id = $_POST["StuID"];
$Title = $_POST["NoticeTitle"];
$Dis = $_POST["Description"];

$sql = "UPDATE `finalsystemdb`.`notice` SET Heading= '$Title', Discription='$Dis'  WHERE Notice_ID = '$id'";
$conn->query($sql);
echo "<script language='javascript' type='text/javascript'>";
echo "alert('Data Updated Successfully');";
echo "</script>";
?>