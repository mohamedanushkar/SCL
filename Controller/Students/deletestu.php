<?php
include '../../model/Connection.php';

$ID = $_POST["id"];


$sql = "DELETE FROM `tbl_student` WHERE Student_ID = '$ID'";

runQuary($sql, "New record deleted Successfully !!!");


?>
