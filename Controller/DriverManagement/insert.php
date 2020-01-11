<?php

include '../../model/Connection.php';
$Driver_ID = $_POST["Driver_ID"];
$Name = $_POST["Name"];
$Address= $_POST["Address"];
$Birth_Of_Date = $_POST["Birth_Of_Date"];
$Phone =$_POST["Phone"];






if ($Driver_ID != '') {

    $sql = "INSERT INTO `Driver`( Driver_ID, Name, Address, Birth_Of_Date, Phone)VALUES('$Driver_ID','$Name','$Address','$Birth_Of_Date','$Phone')";
    $conn->query($sql);    
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Date Entered Successfully');";
    echo "</script>";
} else {

    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('all fields are required');";
    echo "</script>";
}
?>

