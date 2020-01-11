<?php
include '../../model/Connection.php';

$ID = $_POST["id"];
$Grade_Name = $_POST["GradeName"];



$sql = "UPDATE `finalsystemdb`.`Grade` SET Grade_Name= '$Grade_Name'   WHERE Grade_ID = '$ID'";
$conn->query($sql);
  echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Record Updated Successfully');";
    echo "</script>";
?>