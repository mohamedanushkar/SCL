<?php
include '../../model/Connection.php';

$ID = $_POST["id"];

$sql = "UPDATE `tbl_batch` SET `status`= 'Close' WHERE `Batch_ID`= '$ID'";

runQuary($sql, "Batch Successfully !!!");

?>