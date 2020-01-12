<?php
include '../../model/Connection.php';

$ID = $_POST["ID"];
$Name = $_POST["Name"];
$Address = $_POST["Address"];
$Phone = $_POST["Phone"];
$Mail = $_POST["Email"];


$sql = "UPDATE `finalsystemdb`.`student` SET Student_Name= '$Name', Student_Address='$Address' , Student_Phone= '$Phone' ,Student_Email= '$Mail' WHERE id = '$ID'";
$conn->query($sql);
 echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Data Updated Successfully');";
    echo "</script>";
?>