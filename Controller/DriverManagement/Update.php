<?php

include '../../model/Connection.php';

$Driver_ID = $_POST["Driver_ID"];
$Name = $_POST["Name"];
$Address= $_POST["Address"];
$Birth_Of_Date = $_POST["Birth_Of_Date"];
$Phone =$_POST["Phone"];




$sql = "UPDATE `driver` SET `Name`= '$Name',`Address`='$Address',`Birth_Of_Date`='$Birth_Of_Date',`Phone`= '$Phone' WHERE `Driver_ID`= '$Driver_ID';";

if ($conn->query($sql)){
    
echo "<script language='javascript' type='text/javascript'>";
echo "alert('Data Updated Successfully');";
echo "</script>";
}else {
    
echo "<script language='javascript' type='text/javascript'>";
echo "alert('Error');";
echo "</script>";
}
?>