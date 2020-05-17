<?php
include '../../model/Connection.php';

$ID = $_POST["ID"];
$Name = $_POST["Name"];
$Address = $_POST["Address"];
$Phone = $_POST["Phone"];
$Mail = $_POST["Email"];
$Gender = $_POST["Gender"];
$BOD = $_POST["datepicker"];
$password = $_POST["Password"];


$sql ="UPDATE `tbl_student` SET `Student_Name`='$Name',`Student_Address`='$Address',`Student_Phone`='$Phone',`Student_Email`='$Mail',`Gender`='$Gender',`BOD`='$BOD' , `Password` = '$password'  WHERE Student_ID ='$ID'";


    
runQuary($sql, "New record updated Successfully !!!");



?>