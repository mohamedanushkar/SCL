<?php
include '../../model/Connection.php';

$ID = $_POST["id"];
$Subject_Name = $_POST["Subject_Name"];



$sql = "UPDATE `finalsystemdb`.`Subject` SET Subject_Name= '$Subject_Name'   WHERE Subject_ID = '$ID'";
$conn->query($sql);
  echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Record Updated Successfully');";
    echo "</script>";
?>