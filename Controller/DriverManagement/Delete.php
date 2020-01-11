<?php
include '../../model/Connection.php';

$ID = $_POST["id"];



if ($ID == '') {
    echo 'error';
} else {
    $sql = "DELETE FROM `driver` WHERE  Driver_ID = '$ID'";
    $conn->query($sql);
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Date Deleted Successfully');";
    echo "</script>";
}
?>
