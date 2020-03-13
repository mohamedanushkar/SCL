<?php
include '../../model/Connection.php';


$BatchID = $_POST["SelectClass"];

$sql = "SELECT MAX(`Batch_Number`) +1  as maxx FROM tbl_batch WHERE tbl_batch.Class_ID = ".$BatchID ."  LIMIT 1;";



$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result) ;
echo $row['maxx'];
mysqli_close($conn);

?>