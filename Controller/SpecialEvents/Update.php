<?php
include '../../model/Connection.php';

$ID = $_POST["id"];
$Grade = $_POST["Grade"];
$AwardName = $_POST["Award_Name"];
$Description = $_POST["Description"];
$Date = $_POST["Date"];


$sql = "UPDATE `finalsystemdb`.`Special_Awards` SET Student_ID= '$Grade', Award_Name='$AwardName' , Description= '$Description' ,Recieved_Date= '$Date' WHERE Special_Awards_ID = '$ID'";
$conn->query($sql);
 echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Data Updated Successfully');";
    echo "</script>";
?>