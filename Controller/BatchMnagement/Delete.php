
<?php

include '../../model/Connection.php';
$id = $_POST["id"];


$sql = "DELETE FROM `tbl_batch` WHERE Batch_ID ='$id'";


runQuary($sql, "record deleted Successfully !!!");


?>

